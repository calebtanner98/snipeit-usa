<?php

namespace App\Http\Controllers;

use App\Models\Actionlog;
use App\Models\Asset;
use App\Models\License;
use App\Models\Accessory;
use App\Models\AssetModel;
use App\Models\Company;
use App\Models\Setting;
use App\Models\Component;
use App\Models\Consumable;
use App\Models\User;
use App\Models\WaitList;
use App\Notifications\RequestAssetCancelation;
use App\Notifications\RequestAssetNotification;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use \Illuminate\Contracts\View\View;
use App\Models\CheckoutRequest;
use App\Notifications\RequestCanceledNotification;


/**
 * This controller handles all actions related to the ability for users
 * to view their own assets in the Snipe-IT Asset Management application.
 *
 * @version    v1.0
 */
class ViewAssetsController extends Controller
{
    /**
     * Redirect to the profile page.
     *
     */
    public function getIndex() : View | RedirectResponse
    {
        $user = User::with(
            'assets',
            'assets.model',
            'assets.model.fieldset.fields',
            'consumables',
            'accessories',
            'licenses',
        )->find(auth()->id());

        $field_array = array();

        // Loop through all the custom fields that are applied to any model the user has assigned
        foreach ($user->assets as $asset) {

            // Make sure the model has a custom fieldset before trying to loop through the associated fields
            if ($asset->model->fieldset) {

                foreach ($asset->model->fieldset->fields as $field) {
                    // check and make sure they're allowed to see the value of the custom field
                    if ($field->display_in_user_view == '1') {
                        $field_array[$field->db_column] = $field->name;
                    }
                    
                }
            }

        }

        // Since some models may re-use the same fieldsets/fields, let's make the array unique so we don't repeat columns
        array_unique($field_array);

        if (isset($user->id)) {
            return view('account/view-assets', compact('user', 'field_array' ))
                ->with('settings', Setting::getSettings());
        }

        // Redirect to the user management page
        return redirect()->route('users.index')
            ->with('error', trans('admin/users/message.user_not_found', $user->id));
    }

    /**
     * Returns view of requestable items for a user.
     */
    public function getRequestableIndex() : View
    {
        $user = auth()->user();
        $assets = Asset::with('model', 'defaultLoc', 'location', 'assignedTo', 'requests')->Hardware()->RequestableAssets();
        $requestableAssets = Asset::where('requestable', '1')->orderby('name')->get();
        $models = AssetModel::with('category', 'requests', 'assets')->RequestableModels()->get();
        $licenses = License::where('requestable', '1')->get();
        $accessories = Accessory::where('requestable', '1')->get();
        $components = Component::where('requestable', '1')->get();
        $employeeWaitlist = WaitList::where('user_id', $user->id)->whereNull('canceled_at')->whereNull('closed_at')->whereNull('denied_at');
        $consumables = Consumable::where('requestable', '1')->get();
        $pendingRequestCount = CheckoutRequest::where('canceled_at', null)->where('fulfilled_at', null)->where('user_id', $user->id)->count();

        return view('account/requestable-assets', compact('assets', 'models', 'licenses', 'accessories', 'components', 'consumables', 'requestableAssets', 'pendingRequestCount', 'employeeWaitlist'));
    }

    public function getRequestItem(Request $request, $itemType, $itemId = null, $cancel_by_admin = false, $requestingUser = null) : RedirectResponse
    {
        $item = null;
        $fullItemType = 'App\\Models\\'.studly_case($itemType);

        if ($itemType == 'asset_model') {
            $itemType = 'model';
        }
        $item = call_user_func([$fullItemType, 'find'], $itemId);

        $user = auth()->user();

        $logaction = new Actionlog();
        $logaction->item_id = $data['asset_id'] = $item->id;
        $logaction->item_type = $fullItemType;
        $logaction->created_at = $data['requested_date'] = date('Y-m-d H:i:s');

        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }

        $logaction->target_id = $data['user_id'] = auth()->id();
        $logaction->target_type = User::class;

        $data['item_quantity'] = $request->has('request-quantity') ? e($request->input('request-quantity')) : 1;
        $data['requested_by'] = $user->present()->fullName();
        $data['item'] = $item;
        $data['item_type'] = $itemType;
        $data['target'] = auth()->user();
        
        if ($fullItemType == Asset::class) {
            $data['item_url'] = route('hardware.show', $item->id);
        } else {
            $data['item_url'] = route("view/${itemType}", $item->id);
        }

        $settings = Setting::getSettings();

        if (($item_request = $item->isRequestedBy($user)) || $cancel_by_admin) {
            $item->cancelRequest($requestingUser);
            $data['item_quantity'] = ($item_request) ? $item->qty : 1;
            $logaction->logaction('request_canceled');

            if($cancel_by_admin)
            {
                $checkoutRequest = CheckoutRequest::where('user_id', $requestingUser)->where('requestable_id', $item->id)->first();

                $validated = $request->validate([
                    'cancel_reason' => 'string|nullable',
                ]);
                
                $cancelReason = $validated['cancel_reason'] ?? null;  
    
                $requestType = 'Asset';
                $requestName = $item->name;
        
                $user->notify(new RequestCanceledNotification($requestType, $requestName, $cancelReason));
            }

            return redirect()->back()->with('success')->with('success', trans('admin/hardware/message.requests.canceled'));
        } else {
            $item->request();
            if (($settings->alert_email != '') && ($settings->alerts_enabled == '1') && (! config('app.lock_passwords'))) {
                $logaction->logaction('requested');
                $settings->notify(new RequestAssetNotification($data));
            }

            return redirect()->route('requestable-assets')->with('success')->with('success', trans('admin/hardware/message.requests.success'));
        }
    }

    /**
     * Process a specific requested asset
     * @param null $assetId
     */
    public function getRequestAsset($assetId = null) : RedirectResponse
    {
        $user = auth()->user();

        // Check if the asset exists and is requestable
        if (is_null($asset = Asset::RequestableAssets()->find($assetId))) {
            return redirect()->route('requestable-assets')
                ->with('error', trans('admin/hardware/message.does_not_exist_or_not_requestable'));
        }
        if (! Company::isCurrentUserHasAccess($asset)) {
            return redirect()->route('requestable-assets')
                ->with('error', trans('general.insufficient_permissions'));
        }

        $data['item'] = $asset;
        $data['target'] = auth()->user();
        $data['item_quantity'] = 1;
        $settings = Setting::getSettings();

        $logaction = new Actionlog();
        $logaction->item_id = $data['asset_id'] = $asset->id;
        $logaction->item_type = $data['item_type'] = Asset::class;
        $logaction->created_at = $data['requested_date'] = date('Y-m-d H:i:s');

        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $data['user_id'] = auth()->id();
        $logaction->target_type = User::class;

        // If it's already requested, cancel the request.
        if ($asset->isRequestedBy(auth()->user())) {
            $asset->cancelRequest();
            $asset->decrement('requests_counter', 1);

            $logaction->logaction('request canceled');
            //$settings->notify(new RequestAssetCancelation($data));

            return redirect()->route('requestable-assets')
                ->with('success')->with('success', trans('admin/hardware/message.requests.canceled'));
        }

        $logaction->logaction('requested');
        $asset->request();
        $asset->increment('requests_counter', 1);

        return redirect()->route('requestable-assets')->with('success')->with('success', trans('admin/hardware/message.requests.success'));
    }

    public function getRequestedAssets() : View
    {
        $requestedItems = CheckoutRequest::with('user', 'requestedItem')->whereNull('canceled_at')->with('user', 'requestedItem');
        $waitlistedItems = WaitList::where('user_id', auth()->user()->id)->get();

        return view('account/requested', compact('requestedItems', 'waitlistedItems'));
    }

}