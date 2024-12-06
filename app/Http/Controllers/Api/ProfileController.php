<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CheckoutRequest;
use App\Models\WaitList;
use App\Models\Asset;
use App\Models\User;
use App\Models\License;
use App\Models\Component;
use App\Models\Consumable;
use App\Models\Accessory;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Support\Facades\Gate;
use App\Models\CustomField;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * The token repository implementation.
     *
     * @var \Laravel\Passport\TokenRepository
     */
    protected $tokenRepository;

    /**
     * Create a controller instance.
     *
     * @param  \Laravel\Passport\TokenRepository  $tokenRepository
     * @param  \Illuminate\Contracts\Validation\Factory  $validation
     * @return void
     */
    public function __construct(TokenRepository $tokenRepository, ValidationFactory $validation)
    {
        $this->validation = $validation;
        $this->tokenRepository = $tokenRepository;
    }

    /**
     * Display a listing of requested assets.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v4.3.0]
     */
    public function requestedAssets() :  array
    {
        $checkoutRequests = CheckoutRequest::where('user_id', Auth::id())->whereNotNull('requestable_id')->get();

        $results = array();
        $show_field = array();
        $showable_fields = array();
        $results['total'] = $checkoutRequests->count();

        $all_custom_fields = CustomField::all(); //used as a 'cache' of custom fields throughout this page load
        foreach ($all_custom_fields as $field) {
            if (($field->field_encrypted=='0') && ($field->show_in_requestable_list=='1')) {
                $showable_fields[] = $field->db_column_name();
            }
        }

        foreach ($checkoutRequests as $checkoutRequest) {

            // Make sure the asset and request still exist
            if ($checkoutRequest && $checkoutRequest->itemRequested()) {
                $assets = [
                    'image' => e($checkoutRequest->itemRequested()->present()->getImageUrl()),
                    'name' => e($checkoutRequest->itemRequested()->present()->name()),
                    'type' => e($checkoutRequest->itemType()),
                    'qty' => (int) $checkoutRequest->quantity,
                    'location' => ($checkoutRequest->location()) ? e($checkoutRequest->location()->name) : null,
                    'expected_checkin' => Helper::getFormattedDateObject($checkoutRequest->itemRequested()->expected_checkin, 'datetime'),
                    'request_date' => Helper::getFormattedDateObject($checkoutRequest->created_at, 'datetime'),
                    'fulfilled_at' => $checkoutRequest->fulfilled_at,
                    'canceled_at' => $checkoutRequest->canceled_at,
                    'returned_on' => $checkoutRequest->checkedin_at,
                ];

                foreach ($showable_fields as $showable_field_name) {
                    $show_field['custom_fields.'.$showable_field_name] =  $checkoutRequest->itemRequested()->{$showable_field_name};
                }

                // Merge the plain asset data and the custom fields data
                $results['rows'][] = array_merge($assets, $show_field);
            }


        }

        return $results;
    }

    public function requestedLicenses(): array
    {
        $user = auth()->user();
        $checkoutRequests = CheckoutRequest::whereNotNull('license_id')->where('user_id', $user->id)->get();
    
        // Format the licenses
        $licenses = $checkoutRequests->map(function ($checkoutRequest) {
            return [
                'id' => $checkoutRequest->id,
                'name' => $checkoutRequest->license->name,
                'type' => $checkoutRequest->itemType(),
                'qty' => $checkoutRequest->quantity,
                'request_date' => Helper::getFormattedDateObject($checkoutRequest->created_at, 'datetime'),
                'canceled_at' => $checkoutRequest->canceled_at,
                'fulfilled_at' => $checkoutRequest->fulfilled_at,
                'returned_on' => $checkoutRequest->checkedin_at,
            ];
        })->toArray();
    
        return [
            'total' => $checkoutRequests->count(), 
            'license' => $licenses, 
        ];
    }
    

    public function requestedAccessories(): array
    {
        $user = auth()->user();
        $checkoutRequests = CheckoutRequest::whereNotNull('accessory_id')->where('user_id', $user->id)->get();
    
        $accessories = $checkoutRequests->map(function ($checkoutRequest) {
            return [
                'id' => $checkoutRequest->id,
                'name' => $checkoutRequest->accessory->name,
                'type' => $checkoutRequest->itemType(),
                'qty' => $checkoutRequest->quantity,
                'request_date' => Helper::getFormattedDateObject($checkoutRequest->created_at, 'datetime'),
                'canceled_at' => $checkoutRequest->canceled_at,
                'fulfilled_at' => $checkoutRequest->fulfilled_at,
                'returned_on' => $checkoutRequest->checkedin_at,
            ];
        })->toArray();
    
        return [
            'total' => $checkoutRequests->count(),
            'rows' => $accessories,
        ];
    }
    

    public function requestedComponents(): array
    {
        $user = auth()->user();
        $checkoutRequests = CheckoutRequest::whereNotNull('component_id')->where('user_id', $user->id)->get();
    
        $components = $checkoutRequests->map(function ($checkoutRequest) {
            return [
                'id' => $checkoutRequest->id,
                'name' => $checkoutRequest->component->name,
                'type' => $checkoutRequest->itemType(),
                'qty' => $checkoutRequest->quantity,
                'request_date' => Helper::getFormattedDateObject($checkoutRequest->created_at, 'datetime'),
                'canceled_at' => $checkoutRequest->canceled_at,
                'fulfilled_at' => $checkoutRequest->fulfilled_at,
                'returned_on' => $checkoutRequest->checkedin_at,
            ];
        })->toArray();
    
        return [
            'total' => $checkoutRequests->count(),
            'rows' => $components,
        ];
    }
    

    public function requestedConsumables(): array
    {
        $user = auth()->user();
        $checkoutRequests = CheckoutRequest::whereNotNull('consumable_id')->where('user_id', $user->id)->get();
    
        $consumables = $checkoutRequests->map(function ($checkoutRequest) {
            return [
                'id' => $checkoutRequest->id,
                'name' => $checkoutRequest->consumable->name,
                'type' => $checkoutRequest->itemType(),
                'qty' => $checkoutRequest->quantity,
                'request_date' => Helper::getFormattedDateObject($checkoutRequest->created_at, 'datetime'),
                'canceled_at' => $checkoutRequest->canceled_at,
                'fulfilled_at' => $checkoutRequest->fulfilled_at,
                'returned_on' => $checkoutRequest->checkedin_at,
            ];
        })->toArray();
    
        return [
            'total' => $checkoutRequests->count(),
            'rows' => $consumables,
        ];
    }
    
    // Returns the waitlist of a single user, the one logged in
    public function waitlist(): array
    {
        $user = auth()->user();
        $waitlist = Waitlist::where('user_id', $user->id)->whereNull('canceled_at')->whereNull('closed_at')->whereNull('denied_at')
            ->get();
    
        return [
            'total' => $waitlist->count(),
            'waitlist' => $waitlist->map(function ($item) {
                $itemName = 'N/A';
        
                if ($item->requestable_id) {
                    $itemName = Asset::find($item->requestable_id)->model->name;
                } else if ($item->license_id) {
                    $itemName = License::find($item->license_id)->name;
                } else if ($item->accessory_id) {
                    $itemName = Accessory::find($item->accessory_id)->name;
                } else if ($item->component_id) {
                    $itemName = Component::find($item->component_id)->name;
                } else if ($item->consumable_id) {
                    $itemName = Consumable::find($item->consumable_id)->name;
                }

                return [
                    'id' => $item->id,
                    'requestable_id' => $item->requestable_id,
                    'requestable_model' => $itemName,
                    'license_id' => $item->license_id,
                    'quantity' => $item->quantity,
                    'type' => ucfirst($item->itemType()),
                    'accessory_id' => $item->accessory_id,
                    'component_id' => $item->component_id,
                    'consumable_id' => $item->consumable_id,
                    'canceled_at' => Helper::getFormattedDateObject($item->canceled_at, 'datetime'),
                    'requested_at' => Helper::getFormattedDateObject($item->created_at, 'datetime'),
                    'denied_at' => Helper::getFormattedDateObject($item->denied_at, 'datetime'),
                ];
            })
        ];
    }

    // Returns all items on the waitlist for backened view
    public function getWaitlistAll(): array
    {
        $waitlist = Waitlist::whereNull('canceled_at')->with('user')->whereNull('closed_at')->whereNull('denied_at')
            ->get();

        return [
            'total' => $waitlist->count(),
            'waitlist' => $waitlist->map(function ($item) {
                $itemName = 'N/A';

                $user = User::find($item->user_id);
                
                if ($item->requestable_id) {
                    $itemName = Asset::find($item->requestable_id)->model->name;
                } else if ($item->license_id) {
                    $itemName = License::find($item->license_id)->name;
                } else if ($item->accessory_id) {
                    $itemName = Accessory::find($item->accessory_id)->name;
                } else if ($item->component_id) {
                    $itemName = Component::find($item->component_id)->name;
                } else if ($item->consumable_id) {
                    $itemName = Consumable::find($item->consumable_id)->name;
                }

                return [
                    'id' => $item->id,
                    'user_id' => $item->user_id,
                    'name' => $user->first_name . ' ' . $user->last_name, 
                    'requestable_id' => $item->requestable_id,
                    'requestable_model' => $itemName, 
                    'license_id' => $item->license_id,
                    'quantity' => $item->quantity,
                    'accessory_id' => $item->accessory_id,
                    'component_id' => $item->component_id,
                    'consumable_id' => $item->consumable_id,
                    'canceled_at' => Helper::getFormattedDateObject($item->canceled_at, 'datetime'),
                    'requested_at' => Helper::getFormattedDateObject($item->created_at, 'datetime'),
                    'denied_at' => Helper::getFormattedDateObject($item->denied_at, 'datetime'),
                ];
            })
        ];
    }

        // Returns all items on the waitlist for backened view
        public function getProfileWaitlist(): array
        {
            $userId = auth()->user()->id;

            $waitlist = Waitlist::where('user_id', $userId)->with('user')->get();
    
            return [
                'total' => $waitlist->count(),
                'waitlist' => $waitlist->map(function ($item) {
                    $itemName = 'N/A';
    
                    $user = User::find($item->user_id);
                    
                    if ($item->requestable_id) {
                        $itemName = Asset::find($item->requestable_id)->model->name;
                    } else if ($item->license_id) {
                        $itemName = License::find($item->license_id)->name;
                    } else if ($item->accessory_id) {
                        $itemName = Accessory::find($item->accessory_id)->name;
                    } else if ($item->component_id) {
                        $itemName = Component::find($item->component_id)->name;
                    } else if ($item->consumable_id) {
                        $itemName = Consumable::find($item->consumable_id)->name;
                    }
    
                    return [
                        'id' => $item->id,
                        'user_id' => $item->user_id,
                        'name' => $user->first_name . ' ' . $user->last_name, 
                        'requestable_id' => $item->requestable_id,
                        'requestable_model' => $itemName,
                        'license_id' => $item->license_id,
                        'accessory_id' => $item->accessory_id,
                        'quantity' => $item->quantity,
                        'component_id' => $item->component_id,
                        'consumable_id' => $item->consumable_id,
                        'type' => ucfirst($item->itemType()),
                        'requested_at' => Helper::getFormattedDateObject($item->created_at, 'datetime'),
                        'closed_at' => Helper::getFormattedDateObject($item->closed_at, 'datetime'),
                        'canceled_at' => Helper::getFormattedDateObject($item->canceled_at, 'datetime'),
                        'denied_at' => Helper::getFormattedDateObject($item->denied_at, 'datetime'),
                    ];
                })
            ];
        }

    /**
     * Delete an API token
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v6.0.5]
     */
    public function createApiToken(Request $request) : JsonResponse
    {

        if (!Gate::allows('self.api')) {
            abort(403);
        }

        $accessTokenName = $request->input('name', 'Auth Token');

        if ($accessToken = auth()->user()->createToken($accessTokenName)->accessToken) {

            // Get the ID so we can return that with the payload
            $token = DB::table('oauth_access_tokens')->where('user_id', '=', auth()->id())->where('name','=',$accessTokenName)->orderBy('created_at', 'desc')->first();
            $accessTokenData['id'] = $token->id;
            $accessTokenData['token'] = $accessToken;
            $accessTokenData['name'] = $accessTokenName;
            return response()->json(Helper::formatStandardApiResponse('success', $accessTokenData, trans('account/general.personal_api_keys_success', ['key' => $accessTokenName])));
        }
        return response()->json(Helper::formatStandardApiResponse('error', null, 'Token could not be created.'));

    }


    /**
     * Delete an API token
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v6.0.5]
     */
    public function deleteApiToken($tokenId) : Response
    {

        if (!Gate::allows('self.api')) {
            abort(403);
        }

        $token = $this->tokenRepository->findForUser(
            $tokenId, auth()->user()->getAuthIdentifier()
        );

        if (is_null($token)) {
            return new Response('', 404);
        }

        $token->revoke();

        return new Response('', Response::HTTP_NO_CONTENT);

    }


    /**
     * Show user's API tokens
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @since [v6.0.5]
     */
    public function showApiTokens() : JsonResponse
    {

        if (!Gate::allows('self.api')) {
            abort(403);
        }
        
        $tokens = $this->tokenRepository->forUser(auth()->user()->getAuthIdentifier());
        $token_values = $tokens->load('client')->filter(function ($token) {
            return $token->client->personal_access_client && ! $token->revoked;
        })->values();

        return response()->json(Helper::formatStandardApiResponse('success', $token_values, null));

    }



}