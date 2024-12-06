<?php

namespace App\Http\Controllers;

use App\Models\Component;
use App\Models\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Actionlog;
use App\Models\User;
use App\Models\WaitList;
use App\Models\Setting;
use Carbon\Carbon;

class ComponentRequestController extends Controller
{
    /**
     * Handle the request for a component.
     */
    public function requestComponent(Request $request, $componentId)
    {
        $component = Component::findOrFail($componentId);
        $user = auth()->user();
    
        // Check if there are enough components available
        if ($component->qty < 1) {
            return redirect()->route('requestable-assets')
                ->with('error', 'Not enough components available.');
        }
    
        // Check if the user has already requested this component
        if ($component->isRequestedBy($user)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'You have already requested this component.');
        }

        if ($request->input('quantity') <= 0)
        {
            return redirect()->route('requestable-assets')->withFragment('components')
                ->with('error', 'You must request at least one item.');
        }

        if ($request->input('quantity') > $component->numRemaining())
        {
            return redirect()->route('requestable-assets')->withFragment('components')
                ->with('error', 'Not enough of this component available.');
        }
    
        // Create an Actionlog for the request
        $logaction = new Actionlog();
        $logaction->item_id = $component->id;
        $logaction->item_type = Component::class;
        $logaction->created_at = now();
    
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
    
        // If the component is requested by the user, cancel the request
        if ($component->isRequestedBy($user)) {
            $component->cancelRequest($user);
    
            $logaction->logaction('request canceled');
            $logaction->save();
    
            return redirect()->route('requestable-assets')
                ->with('success', 'Component request canceled successfully.');
        }
    
        // Create the request
        CheckoutRequest::create([
            'user_id' => $user->id,
            'component_id' => $component->id,
            'quantity' => $request->input('quantity'), 
            'requestable_id' => null,
            'requestable_type' => 'App\Models\Component'
        ]);
    
        $logaction->logaction('requested');
        $logaction->save();
    
        return redirect()->route('requestable-assets')->withFragment('components')
            ->with('success', 'Component requested successfully.');
    }
    
    /**
     * Cancel the request for a component.
     */
    public function cancelComponentRequest(Request $request, $componentId)
    {
        $component = Component::findOrFail($componentId);
        $user = auth()->user();
    
        $checkoutRequest = CheckoutRequest::where('component_id', $component->id)
                                          ->where('user_id', $user->id)
                                          ->whereNull('canceled_at')
                                          ->whereNull('fulfilled_at')
                                          ->whereNull('checkedin_at')
                                          ->first();
    
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($checkoutRequest)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'Component request not found.');
        }
    
        // Create an Actionlog for the cancellation
        $logaction = new Actionlog();
        $logaction->item_id = $component->id;
        $logaction->item_type = Component::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('request canceled');
        $logaction->save();
    
        $component->cancelRequest($user->id, $checkoutRequest->component_id);
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $component;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification (optional)
        
        return redirect()->route('requestable-assets')->withFragment('components')
            ->with('success', 'Component request canceled successfully.');
    }

    public function waitlistComponentRequest(Request $request, $component_id)
    {
        $component = Component::findOrFail($component_id);
        $user = auth()->user();

        if ($request->input('quantity') <= 0)
        {
            return redirect()->route('requestable-assets')->withFragment('components')
                ->with('error', 'You must request at least one item.');
        }

        $waitlistRecord = WaitList::create([
            'component_id' => $component->id,
            'quantity' => $request->input('quantity'), 
            'user_id' => $user->id,
        ]);

        $logaction = new Actionlog();
        $logaction->item_id = $component_id;
        $logaction->item_type = Component::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlisted_component');
        $logaction->save();

        return redirect()->route('requestable-assets')->withFragment('components')
        ->with('success', 'Success! Added to the waitlist for this component.');
    }

    /**
     * Cancel the request for an accessory - on admin view.
     */
    public function cancelComponentRequestAdmin(Request $request, $requestId)
    {    
        $validated = $request->validate([
            'cancel_reason' => 'string|nullable',
        ]);
        
        $cancelReason = $validated['cancel_reason'] ?? null;  

        $checkoutRequest = CheckoutRequest::findOrFail($requestId);
        $user = User::findOrFail($checkoutRequest->user_id);

        $component = Component::findOrFail($checkoutRequest->component_id);

        // Check if the request exists and the user is authorized to cancel it
        if (is_null($checkoutRequest)) {
            return redirect()->route('assets.requested')->withFragment('components')
                ->with('error', 'Accessory request not found.');
        }
    
        $logaction = new Actionlog();
        $logaction->item_id = $checkoutRequest->component_id;
        $logaction->user_id = auth()->user()->id;
        $logaction->item_type = Component::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('request canceled');
        $logaction->save();
    
        $component->cancelRequest($user->id, $checkoutRequest->component_id, $cancelReason); 
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $component;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification

        return redirect()->route('assets.requested')->withFragment('components')
            ->with('success', 'Component request canceled successfully.');
    }
}