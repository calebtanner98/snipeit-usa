<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Actionlog;
use App\Models\User;
use App\Models\WaitList;
use App\Models\Setting;
use Carbon\Carbon;

class AccessoryRequestController extends Controller
{
    /**
     * Handle the request for an accessory.
     */
    public function requestAccessory(Request $request, $accessory_id)
    {
        $accessory = Accessory::findOrFail($accessory_id);
        $user = auth()->user();
    
        if ($accessory->qty < 1) {
            return redirect()->route('requestable-assets')
                ->with('error', 'Not enough accessories available.')->withFragment('accessories');
        }
    
        if ($accessory->isRequestedBy($user)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'You have already requested this accessory.')->withFragment('accessories');
        }

        if ($request->input('quantity') <= 0)
        {
            return redirect()->route('requestable-assets')->withFragment('accessories')
                ->with('error', 'You must request at least one item.');
        }

        if ($request->input('quantity') > $accessory->numRemaining())
        {
            return redirect()->route('requestable-assets')->withFragment('accessories')
            ->with('error', 'Not enough of this accesory available.');
        }
    
        // Create an Actionlog for the request
        $logaction = new Actionlog();
        $logaction->item_id = $accessory->id;
        $logaction->item_type = Accessory::class;
        $logaction->created_at = now();
    
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
    
        // If the accessory is requested by the user, cancel the request
        if ($accessory->isRequestedBy($user)) {
            $accessory->cancelRequest($user);
    
            $logaction->logaction('request canceled');
            $logaction->save();
    
            return redirect()->route('requestable-assets')
                ->with('success', 'Accessory request canceled successfully.');
        }
    
        for ($i = 0; $i < $request->input('quantity'); $i++)
        {
            CheckoutRequest::create([
                'user_id' => $user->id,
                'accessory_id' => $accessory->id,
                'quantity' => 1,
                'requestable_id' => null,
                'requestable_type' => 'App\Models\Accessory'
            ]);
        }

        $logaction->logaction('requested');
        $logaction->save();
    
        return redirect()->route('requestable-assets')->withFragment('accessories')
            ->with('success', 'Accessory requested successfully.');
    }

    /**
     * Cancel the request for an accessory - on request portal. This is not admin side request.
     */
    public function cancelAccessoryRequest(Request $request, $accessoryId)
    {
        $accessory = Accessory::findOrFail($accessoryId);
        $user = auth()->user();
    
        $checkoutRequest = CheckoutRequest::where('accessory_id', $accessory->id)
                                          ->where('user_id', $user->id)
                                          ->whereNull('canceled_at')
                                          ->whereNull('fulfilled_at')
                                          ->whereNull('checkedin_at')
                                          ->get();
        
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($checkoutRequest)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'Accessory request not found.');
        }
    
        $logaction = new Actionlog();
        $logaction->item_id = $accessory->id;
        $logaction->item_type = Accessory::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('request canceled');
        $logaction->save();

        // Since accessories have their own individual record, loop through and cancel each one
        foreach($checkoutRequest as $request)
        {
            $accessory->cancelRequest($user->id, $request->accessory_id); 
        }
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $accessory;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification

        return redirect()->route('requestable-assets')->withFragment('accessories')
            ->with('success', 'Accessory request canceled successfully.');
    }

    /**
     * Cancel the request for an accessory - on admin view.
     */
    public function cancelAccessoryRequestAdmin(Request $request, $requestId)
    {    
        $checkoutRequest = CheckoutRequest::where('id', $requestId)->first();
        $user = User::findOrFail($checkoutRequest->user_id);

        $accessory = Accessory::findOrFail($checkoutRequest->accessory_id);

        $validated = $request->validate([
            'cancel_reason' => 'string|nullable',
        ]);
        
        $cancelReason = $validated['cancel_reason'] ?? null;   

        // Check if the request exists and the user is authorized to cancel it
        if (is_null($checkoutRequest)) {
            return redirect()->route('assets.requested')->withFragment('accessories')
                ->with('error', 'Accessory request not found.');
        }
    
        $logaction = new Actionlog();
        $logaction->item_id = $checkoutRequest->accessory_id;
        $logaction->item_type = Accessory::class;
        $logaction->user_id = auth()->user()->id;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('request canceled');
        $logaction->save();
    
        $accessory->cancelRequest($user->id, $checkoutRequest->accessory_id, $cancelReason); 
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $accessory;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification

        return redirect()->route('assets.requested')->withFragment('accessories')
            ->with('success', 'Accessory request canceled successfully.');
    }

    public function waitlistAccessoryRequest(Request $request, $accessory_id)
    {
        $accessory = Accessory::findOrFail($accessory_id);
        $user = auth()->user();

        $waitlistRecord = WaitList::create([
            'accessory_id' => $accessory->id,
            'quantity' => $request->input('quantity'),
            'user_id' => $user->id,
        ]);

        $logaction = new Actionlog();
        $logaction->item_id = $accessory_id;
        $logaction->item_type = Accessory::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlisted_accessory');
        $logaction->save();

        return redirect()->route('requestable-assets')->withFragment('accessories')
        ->with('success', 'Success! Added to the waitlist for this accessory.');
    }
}