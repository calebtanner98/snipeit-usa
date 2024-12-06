<?php

namespace App\Http\Controllers\Components;

use App\Events\CheckoutableCheckedOut;
use App\Events\ComponentCheckedOut;
use App\Models\CheckoutRequest;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\User;
use App\Models\Component;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ComponentCheckoutController extends Controller
{
    /**
     * Returns a view that allows the checkout of a component to an asset.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @see ComponentCheckoutController::store() method that stores the data.
     * @since [v3.0]
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create($id, $requestId = null)
    {

        if ($component = Component::find($id)) {

            $this->authorize('checkout', $component);

            // Make sure the category is valid
            if ($component->category) {

                // Make sure there is at least one available to checkout
                if ($component->numRemaining() <= 0){
                    return redirect()->back()
                        ->with('error', trans('admin/components/message.checkout.unavailable'));
                }

                $fieldname = 'asset_id';
                $translated_name = trans('general.select_asset');

                if ($requestId)
                {
                    $checkoutRequest = CheckoutRequest::findOrFail($requestId);
                    $user = User::findOrFail($checkoutRequest->user_id);

                    $assets = Asset::where('assigned_to', $user->id)->get();

                    if ($assets->count() < 1)
                    {
                        return redirect()->back()->withFragment('components')->with('error', 'User does not have any assets available');
                    }
                    
                    return view('components/checkout', compact('component', 'fieldname', 'translated_name', 'assets', 'requestId', 'checkoutRequest'));

                }

                // Return the checkout view
                return view('components/checkout', compact('component', 'fieldname', 'translated_name', 'requestId'));
            }

            // Invalid category
            return redirect()->route('components.edit', ['component' => $component->id])
                ->with('error', trans('general.invalid_item_category_single', ['type' => trans('general.component')]));
        }

        // Not found
        return redirect()->route('components.index')->with('error', trans('admin/components/message.not_found'));

    }

    /**
     * Validate and store checkout data.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @see ComponentCheckoutController::create() method that returns the form.
     * @since [v3.0]
     * @param Request $request
     * @param int $componentId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, $componentId, $requestId = null)
    {
        // Check if the component exists
        if (!$component = Component::find($componentId)) {
            // Redirect to the component management page with error
            return redirect()->route('components.index')->with('error', trans('admin/components/message.not_found'));
        }

        $this->authorize('checkout', $component);

        // If request_id is provided, fetch the checkout request
        $checkoutRequest = null;
        if ($requestId) {
            $checkoutRequest = CheckoutRequest::findOrFail($requestId);

            if ($request->input('assigned_qty') != $checkoutRequest->quantity)
            {
                return redirect()->back()->withFragment('components')->with('error', "User requested $checkoutRequest->quantity items.");
            }
        }
        

        $max_to_checkout = $component->numRemaining();

        // Make sure there are at least the requested number of components available to checkout
        if ($max_to_checkout < $request->get('assigned_qty')) {
            return redirect()->back()->withInput()->with('error', trans('admin/components/message.checkout.unavailable', ['remaining' => $max_to_checkout, 'requested' => $request->get('assigned_qty')]));
        }

        $validator = Validator::make($request->all(), [
            'asset_id'          => 'required|exists:assets,id',
            'assigned_qty'      => "required|numeric|min:1|digits_between:1,$max_to_checkout",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if the asset exists
        $asset = Asset::find($request->input('asset_id'));

        if ((Setting::getSettings()->full_multiple_companies_support) && $component->company_id !== $asset->company_id) {
            return redirect()->route('components.checkout.show', $componentId)->with('error', trans('general.error_user_company'));
        }

        // Update the component data
        $component->asset_id = $request->input('asset_id');
        $component->assets()->attach($component->id, [
            'component_id' => $component->id,
            'user_id' => auth()->user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'assigned_qty' => $request->input('assigned_qty'),
            'asset_id' => $request->input('asset_id'),
            'note' => $request->input('note'),
        ]);

        if ($requestId) {
            $checkoutRequest->fulfilled_at = Carbon::now();
            $checkoutRequest->save();
        }

        event(new CheckoutableCheckedOut($component, $asset, auth()->user(), $request->input('note')));

        $request->request->add(['checkout_to_type' => 'asset']);
        $request->request->add(['assigned_asset' => $asset->id]);

        session()->put(['redirect_option' => $request->get('redirect_option'), 'checkout_to_type' => $request->get('checkout_to_type')]);

        if ($requestId) {
            return redirect()->route('assets.requested')->withFragment('components')->with('success', 'Asset has been successfully checked out.');
        }

        return redirect()->to(Helper::getRedirectOption($request, $component->id, 'Components'))->with('success', trans('admin/components/message.checkout.success'));
    }
}