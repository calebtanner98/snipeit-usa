<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use App\Models\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Actionlog;
use App\Models\User;
use App\Models\WaitList;
use App\Models\Setting;
use Carbon\Carbon;

class ConsumableRequestController extends Controller
{
    public function requestConsumable(Request $request, $consumableId)
    {
        $consumable = Consumable::findOrFail($consumableId);
        $user = auth()->user();
            
        // Check if there are enough components available
        if ($consumable->qty < 1) {
            return redirect()->route('requestable-assets')
                ->with('error', 'Not enough components available.');
        }
    
        // Check if the user has already requested this component
        if ($consumable->isRequestedBy($user)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'You have already requested this component.');
        }

        if ($request->input('quantity') > $consumable->numRemaining())
        {
            return redirect()->route('requestable-assets')->withFragment('consumables')
            ->with('error', 'Not enough of this consumable available.');
        }

        if ($request->input('quantity') <= 0)
        {
            return redirect()->route('requestable-assets')->withFragment('components')
                ->with('error', 'You must request at least one item.');
        }
    
        // Create an Actionlog for the request
        $logaction = new Actionlog();
        $logaction->item_id = $consumable->id;
        $logaction->item_type = Consumable::class;
        $logaction->created_at = now();
    
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
    
        // Create the request
        CheckoutRequest::create([
            'user_id' => $user->id,
            'consumable_id' => $consumable->id,
            'quantity' => $request->input('quantity'), 
            'requestable_id' => null,
            'requestable_type' => 'App\Models\Consumable'
        ]);
    
        $logaction->logaction('requested');
        $logaction->save();
    
        return redirect()->route('requestable-assets')->withFragment('consumables')
            ->with('success', 'Consumable requested successfully.');
    }
    
    /**
     * Cancel the request for a component.
     */
    public function cancelConsumableRequest(Request $request, $consumable_id)
    {
        $consumable = Consumable::findOrFail($consumable_id);
        $user = auth()->user();
    
        $checkoutRequest = CheckoutRequest::where('consumable_id', $consumable->id)
                                          ->where('user_id', $user->id)
                                          ->whereNull('canceled_at')
                                          ->whereNull('fulfilled_at')
                                          ->whereNull('checkedin_at')
                                          ->first();
    
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($checkoutRequest)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'Consumable request not found.');
        }
    
        // Create an Actionlog for the cancellation
        $logaction = new Actionlog();
        $logaction->item_id = $consumable->id;
        $logaction->item_type = Consumable::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('request canceled');
        $logaction->save();
    
        $consumable->cancelRequest($user->id, $checkoutRequest->consumable_id);
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $consumable;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification (optional)
        
        return redirect()->route('requestable-assets')->withFragment('consumables')
            ->with('success', 'Consumable request canceled successfully.');
    }
    

    public function waitlistConsumableRequest(Request $request, $consumable_id)
    {
        $consumable = Consumable::findOrFail($consumable_id);
        $user = auth()->user();

        if ($request->input('quantity') <= 0)
        {
            return redirect()->route('requestable-assets')->withFragment('components')
                ->with('error', 'You must request at least one item.');
        }
    
        $waitlistRecord = WaitList::create([
            'consumable_id' => $consumable->id,
            'quantity' => $request->input('quantity'), 
            'user_id' => $user->id,
        ]);
    
        $logaction = new Actionlog();
        $logaction->item_id = $consumable_id;
        $logaction->item_type = Consumable::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlisted_consumable');
        $logaction->save();
    
        return redirect()->route('requestable-assets')->withFragment('consumables')
            ->with('success', 'Success! Added to the waitlist for this consumable.');
    }
    
    public function cancelConsumableRequestAdmin(Request $request, $requestId)
    {
        $checkoutRequest = CheckoutRequest::where('id', $requestId)->whereNull('canceled_at')->first();
        if (!$checkoutRequest) {
            return redirect()->route('assets.requested')->withFragment('consumables')
                ->with('error', 'Consumable request not found.');
        }

        $validated = $request->validate([
            'cancel_reason' => 'string|nullable',
        ]);
        
        $cancelReason = $validated['cancel_reason'] ?? null;  

        $user = User::findOrFail($checkoutRequest->user_id);
        $consumable = Consumable::findOrFail($checkoutRequest->consumable_id);

        $logaction = new Actionlog();
        $logaction->item_id = $checkoutRequest->consumable_id;
        $logaction->user_id = auth()->user()->id;
        $logaction->item_type = Consumable::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('request canceled');
        $logaction->save();

        $consumable->cancelRequest($user->id, $checkoutRequest->consumable_id, $cancelReason);

        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $consumable;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification

        return redirect()->route('assets.requested')->withFragment('consumables')
            ->with('success', 'Consumable request canceled successfully.');
    }

}