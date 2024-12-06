<?php

namespace App\Http\Controllers\Assets;

use App\Exceptions\CheckoutNotAllowed;
use App\Helpers\Helper;
use App\Http\Controllers\CheckInOutRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssetCheckoutRequest;
use App\Models\Asset;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use \Illuminate\Contracts\View\View;
use \Illuminate\Http\RedirectResponse;
use App\Models\CheckoutRequest;  
use Carbon\Carbon;

class AssetCheckoutController extends Controller
{
    use CheckInOutRequest;

    /**
     * Returns a view that presents a form to check an asset out to a
     * user.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param int $assetId
     * @since [v1.0]
     * @return \Illuminate\Contracts\View\View
     */
    public function create($assetId, $request_id = null) : View | RedirectResponse
    {
        // Check if the asset exists
        if (is_null($asset = Asset::with('company')->find(e($assetId)))) {
            return redirect()->route('hardware.index')->with('error', trans('admin/hardware/message.does_not_exist'));
        }
    
        $this->authorize('checkout', $asset);
    
        if (!$asset->model) {
            return redirect()->route('hardware.show', $asset->id)->with('error', trans('admin/hardware/general.model_invalid_fix'));
        }
    
        // If request_id is provided, fetch the checkout request
        $checkoutRequest = null;
        if ($request_id) {
            $checkoutRequest = CheckoutRequest::findOrFail($request_id);
        }
    
        if ($asset->availableForCheckout()) {
            return view('hardware/checkout', compact('asset', 'checkoutRequest'))
                ->with('statusLabel_list', Helper::deployableStatusLabelList())
                ->with('table_name', 'Assets');
        }
    
        return redirect()->back()->with('error', trans('admin/hardware/message.checkout.not_available'));
    }
    

    /**
     * Validate and process the form data to check out an asset to a user.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param AssetCheckoutRequest $request
     * @since [v1.0]
     */
    public function store(AssetCheckoutRequest $request, $assetId, $request_id = null) : RedirectResponse
    {
        try {
            // Check if the asset exists
            if (! $asset = Asset::find($assetId)) {
                return redirect()->route('hardware.index')->with('error', trans('admin/hardware/message.does_not_exist'));
            } elseif (! $asset->availableForCheckout()) {
                return redirect()->route('hardware.index')->with('error', trans('admin/hardware/message.checkout.not_available'));
            }
    
            $this->authorize('checkout', $asset);
    
            if (!$asset->model) {
                return redirect()->route('hardware.show', $asset->id)->with('error', trans('admin/hardware/general.model_invalid_fix'));
            }

            $admin = auth()->user();
            $target = $this->determineCheckoutTarget();

            // Fetch the CheckoutRequest using the request_id, if it exists. If a request is given, it will populate the checkout_request_id in the assets table and fulfilled at in 
            // the checkout_requests table.
            $checkoutRequest = null;
            if ($request_id) {
                $checkoutRequest = CheckoutRequest::findOrFail($request_id);
                if ($target->id == $checkoutRequest->user_id)
                {
                    $checkoutRequest->fulfilled_at = Carbon::now();
                    $checkoutRequest->save();
                    $asset->checkout_request_id = $checkoutRequest->id;
                    
                } else 
            // If trying to assign to a user that did not request, throw error.
                {
                    return redirect()->back()->with('error', trans('The user selected did not request this asset. Please select the user that requested the asset.'));
                }
            }
            
            $asset = $this->updateAssetLocation($asset, $target);
            $checkout_at = date('Y-m-d H:i:s');
            if (($request->filled('checkout_at')) && ($request->get('checkout_at') != date('Y-m-d'))) {
                $checkout_at = $request->get('checkout_at');
            }
    
            $expected_checkin = '';
            if ($request->filled('expected_checkin')) {
                $expected_checkin = $request->get('expected_checkin');
            }
    
            if ($request->filled('status_id')) {
                $asset->status_id = $request->get('status_id');
            }
    
            // Handle license seats if they exist
            if (!empty($asset->licenseseats->all())) {
                if (request('checkout_to_type') == 'user') {
                    foreach ($asset->licenseseats as $seat) {
                        $seat->assigned_to = $target->id;
                        $seat->save();
                    }
                }
            }
    
            $settings = \App\Models\Setting::getSettings();
    
            // Check for company mismatch (if applicable)
            if (($settings->full_multiple_companies_support) && ((!is_null($target->company_id)) && (!is_null($asset->company_id)))) {
                if ($target->company_id != $asset->company_id) {
                    return redirect()->to("hardware/$assetId/checkout")->with('error', trans('general.error_user_company'));
                }
            }
    
            session()->put(['redirect_option' => $request->get('redirect_option'), 'checkout_to_type' => $request->get('checkout_to_type')]);
    
            if ($asset->checkOut($target, $admin, $checkout_at, $expected_checkin, $request->get('note'), $request->get('name'))) {
                // Optionally, update the CheckoutRequest status if applicable
                if ($request_id) {
                    $checkoutRequest->update(['status' => 'completed', 'completed_at' => now()]);
                    return redirect()->route('assets.requested')->with('success', 'Asset has been successfully checked out.');
                }
                return redirect()->to(Helper::getRedirectOption($request, $asset->id, 'Assets'))
                    ->with('success', trans('admin/hardware/message.checkout.success'));
            }
    
            // Redirect to the asset management page with error
            return redirect()->to("hardware/$assetId/checkout")->with('error', trans('admin/hardware/message.checkout.error') . $asset->getErrors());
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', trans('admin/hardware/message.checkout.error'))->withErrors($asset->getErrors());
        } catch (CheckoutNotAllowed $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
}