<?php

// Added by USA Team To Manage License Request

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Actionlog;
use App\Models\User;
use App\Models\WaitList;
use App\Models\Setting;
use Carbon\Carbon;

class LicenseRequestController extends Controller
{
    /**
     * Handle the request for a license.
     */
    public function requestLicense(Request $request, $licenseId)
    {
        $license = License::findOrFail($licenseId);
        $user = auth()->user();
    
        if ($license->freeSeats()->count() < 1) {
            return redirect()->route('requestable-assets')
                ->with('error', 'Not enough seats available.');
        }
    
        if ($license->isRequestedBy($user)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'You have already requested this license.');
        }
    
        // Create an Actionlog for the request
        $logaction = new Actionlog();
        $logaction->item_id = $license->id;
        $logaction->item_type = License::class;
        $logaction->created_at = now();
    
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
    
        // If the license is requested by the user, cancel the request
        if ($license->isRequestedBy($user)) {
            $license->cancelRequest($user, $license->id);
    
            $logaction->logaction('request canceled');
            $logaction->save();
    
            return redirect()->route('requestable-assets')
                ->with('success', 'License request canceled successfully.');
        }
    
        CheckoutRequest::create([
            'user_id' => $user->id,
            'license_id' => $license->id,
            'seats_requested' => 1, 
            'requestable_id' => null,
            'requestable_type' => 'App\Models\License'
        ]);
    
        $logaction->logaction('requested');
        $logaction->save();
    
        return redirect()->route('requestable-assets')->withFragment('licenses')
            ->with('success', 'License requested successfully.');
    }

    public function postCancelLicenseRequest(Request $request, $licenseId, $userId)
    {
        $validated = $request->validate([
            'cancel_reason' => 'string|nullable',
        ]);
        
        $cancelReason = $validated['cancel_reason'] ?? null;     

        $license = License::findOrFail($licenseId);
        $user = User::findOrFail($userId);
    
        $checkoutRequest = CheckoutRequest::where('license_id', $license->id)
                                          ->where('user_id', $user->id)
                                          ->whereNull('canceled_at')
                                          ->first();
    
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($checkoutRequest)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'License request not found.');
        }
    
        $logaction = new Actionlog();
        $logaction->item_id = $license->id;
        $logaction->user_id = auth()->user()->id;
        $logaction->item_type = License::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('request canceled');
        $logaction->save();
    
        $license->cancelRequest($user->id, $checkoutRequest->license_id, $cancelReason ); 
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $license;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification
        
        return redirect()->route('assets.requested')->withFragment('licenses')
            ->with('success', 'License request canceled successfully.');
    }
    
    public function cancelLicenseRequest(Request $request, $licenseId)
    {
        $license = License::findOrFail($licenseId);
        $user = auth()->user();
    
        $checkoutRequest = CheckoutRequest::where('license_id', $license->id)
                                          ->where('user_id', $user->id)
                                          ->whereNull('canceled_at')
                                          ->whereNull('fulfilled_at')
                                          ->first();
    
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($checkoutRequest)) {
            return redirect()->route('requestable-assets')
                ->with('error', 'License request not found.');
        }
    
        $logaction = new Actionlog();
        $logaction->item_id = $license->id;
        $logaction->item_type = License::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('request canceled');
        $logaction->save();
    
        $license->cancelRequest($user->id, $licenseId); 
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $license;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification
        
        return redirect()->route('requestable-assets')->withFragment('licenses')
            ->with('success', 'License request canceled successfully.');
    }

    public function waitlistLicenseRequest(Request $request, $licenseId)
    {
        $license = License::findOrFail($licenseId);
        $user = auth()->user();

        $waitlistRecord = WaitList::create([
            'license_id' => $license->id,
            'quantity' => 1,
            'user_id' => $user->id,
        ]);

        $logaction = new Actionlog();
        $logaction->item_id = $licenseId;
        $logaction->item_type = License::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlisted_license');
        $logaction->save();

        return redirect()->route('requestable-assets')->withFragment('licenses')
        ->with('success', 'Success! Added to the waitlist for this license.');
    }
      
}