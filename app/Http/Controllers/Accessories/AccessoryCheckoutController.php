<?php

namespace App\Http\Controllers\Accessories;

use App\Events\CheckoutableCheckedOut;
use App\Helpers\Helper;
use App\Http\Controllers\CheckInOutRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccessoryCheckoutRequest;
use App\Models\Accessory;
use App\Models\CheckoutRequest;
use App\Models\AccessoryCheckout;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\View\View;
use \Illuminate\Http\RedirectResponse;
use App\Notifications\CheckoutRequestApprovedNotification;

class AccessoryCheckoutController extends Controller
{

    use CheckInOutRequest;

    /**
     * Return the form to checkout an Accessory to a user.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param  int $id
     */
    public function create($id, $request_id = null) : View | RedirectResponse
    {
        if ($accessory = Accessory::withCount('checkouts as checkouts_count')->find($id)) {

            $this->authorize('checkout', $accessory);

            $checkoutRequest = null;
            if ($request_id) {
                $checkoutRequest = CheckoutRequest::findOrFail($request_id);
            }

            if ($accessory->category) {
                // Make sure there is at least one available to checkout
                if ($accessory->numRemaining() <= 0){
                    return redirect()->back()->withFragment('accessories')->with('error', trans('admin/accessories/message.checkout.unavailable'));
                }

                // Return the checkout view
                return view('accessories/checkout', compact('accessory', 'request_id', 'checkoutRequest'));
            }

            // Invalid category
            return redirect()->route('accessories.edit', ['accessory' => $accessory->id])
                ->with('error', trans('general.invalid_item_category_single', ['type' => trans('general.accessory')]));

        }

        // Not found
        return redirect()->route('accessories.index')->with('error', trans('admin/accessories/message.not_found'));

    }

    /**
     * Save the Accessory checkout information.
     *
     * If Slack is enabled and/or asset acceptance is enabled, it will also
     * trigger a Slack message and send an email.
     *
     * @author [A. Gianotto] [<snipe@snipe.net>]
     * @param Request $request
     * @param  Accessory $accessory
     */
    public function store(AccessoryCheckoutRequest $request, Accessory $accessory, $requestId = null)
    {          

        $this->authorize('checkout', $accessory);

        $target = $this->determineCheckoutTarget();
        
        $accessory->checkout_qty = $request->input('checkout_qty', 1);

        $checkoutRequest = null;
        if ($requestId) {
            $checkoutRequest = CheckoutRequest::findOrFail($requestId);
            if ($target->id != $checkoutRequest->user_id)
            // If trying to assign to a user that did not request, throw error.
            {
                return redirect()->back()->withFragment('accessories')->with('error', trans('The user selected did not request this accessory. Please select the user that requested the accessory.'));
            }
        }
        
        for ($i = 0; $i < $accessory->checkout_qty; $i++) {
            AccessoryCheckout::create([
                'accessory_id' => $accessory->id,
                'created_at' => Carbon::now(),
                'user_id' => Auth::id(),
                'assigned_to' => $target->id,
                'assigned_type' => $target::class,
                'note' => $request->input('note'),
                'checkout_request_id' => $requestId,
            ]);
        }
        event(new CheckoutableCheckedOut($accessory,  $target, auth()->user(), $request->input('note')));
    
        // Set this as user since we only allow checkout to user for this item type
        $request->request->add(['checkout_to_type' => request('checkout_to_type')]);
        $request->request->add(['assigned_user' => $target->id]);

        if ($requestId) {
            $checkoutRequest->fulfilled_at = Carbon::now();
            $checkoutRequest->save();

            $requestType = 'Acessory';
            $requestName = $checkoutRequest->accessory->name;

            $target->notify(new CheckoutRequestApprovedNotification($requestType, $requestName));         
        }

        session()->put(['redirect_option' => $request->get('redirect_option'), 'checkout_to_type' => $request->get('checkout_to_type')]);

        if ($requestId && $target)
        {
            return redirect()->route('assets.requested')->withFragment('accessories')->with('success', trans('admin/accessories/message.checkout.success'));
            
        } else {
            return redirect()->to(Helper::getRedirectOption($request, $accessory->id, 'Accessories'))->with('success', trans('admin/accessories/message.checkout.success'));
        }

        if(!$requestId)
        {
        // Redirect to the new accessory page
        return redirect()->to(Helper::getRedirectOption($request, $accessory->id, 'Accessories'))
            ->with('success', trans('admin/accessories/message.checkout.success'));
        } else {
            // Redirect to the new accessory page
            return redirect()->route('assets.requested')->with('success', trans('Accessory has been checked out.'));
        }
    }
}