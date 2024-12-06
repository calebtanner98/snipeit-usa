<?php

namespace App\Http\Controllers;
use App\Models\License;
use App\Models\Asset;
use App\Models\Accessory;
use App\Models\Component;
use App\Models\Consumable;
use App\Models\CheckoutRequest;
use Illuminate\Http\Request;
use App\Models\Actionlog;
use App\Models\User;
use App\Models\WaitList;
use App\Models\Setting;
use Carbon\Carbon;

class WaitListController extends Controller
{
    public function cancelWaitlistRequest(Request $request, $waitlistId)
    {
        $waitlist = WaitList::findOrFail($waitlistId);
        $user = auth()->user();
    
        $waitlist = WaitList::where('id', $waitlist->id)
                                          ->where('user_id', $user->id)
                                          ->first();
    
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($waitlist)) {
            return redirect()->route('requestable-assets')->withFragment('waitlist')
                ->with('error', 'Waitlist item request not found.');
        }
    
        $logaction = new Actionlog();
        if ($waitlist->license_id) {
            $logaction->item_id = $waitlist->license_id;
        } else if ($waitlist->requestable_id){
            $logaction->item_id = $waitlist->requestable_id;
        } else if ($waitlist->component_id){
            $logaction->item_id = $waitlist->component_id;
        } else if ($waitlist->accessory_id){
            $logaction->item_id = $waitlist->accessory_id;
        } else if ($waitlist->consumable_id){
            $logaction->item_id = $waitlist->consumable_id;
        }

        if ($waitlist->license_id) {
            $logaction->item_type = License::class;
        } else if ($waitlist->requestable_id){
            $logaction->item_type = Asset::class;
        } else if ($waitlist->component_id){
            $logaction->item_type = Component::class;
        } else if ($waitlist->accessory_id){
            $logaction->item_type = Accessory::class;
        } else if ($waitlist->consumable_id){
            $logaction->item_type = Consumable::class;
        }

        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlist_request_canceled');
        $logaction->save();
    
        $waitlist->cancelRequest($waitlist->id); 
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $waitlist;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification
        
        return redirect()->route('requestable-assets')->withFragment('waitlist')
            ->with('success', 'Waitlist request canceled successfully.');
    }

    public function adminCancelWaitlistRequest(Request $request, $waitlistId)
    {
        $waitlist = WaitList::findOrFail($waitlistId);
        $user = User::findOrFail($waitlist->user_id);
    
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($waitlist)) {
            return redirect()->route('requestable-assets')->withFragment('waitlist')
                ->with('error', 'Waitlist item request not found.');
        }
    
        $logaction = new Actionlog();
        if ($waitlist->license_id) {
            $logaction->item_id = $waitlist->license_id;
        } else if ($waitlist->requestable_id){
            $logaction->item_id = $waitlist->requestable_id;
        } else if ($waitlist->component_id){
            $logaction->item_id = $waitlist->component_id;
        } else if ($waitlist->accessory_id){
            $logaction->item_id = $waitlist->accessory_id;
        } else if ($waitlist->consumable_id){
            $logaction->item_id = $waitlist->consumable_id;
        }
        
        if ($waitlist->license_id) {
            $logaction->item_type = License::class;
        } else if ($waitlist->requestable_id){
            $logaction->item_type = Asset::class;
        } else if ($waitlist->component_id){
            $logaction->item_type = Component::class;
        } else if ($waitlist->accessory_id){
            $logaction->item_type = Accessory::class;
        } else if ($waitlist->consumable_id){
            $logaction->item_id = $waitlist->consumable_id;
        }

        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->user_id = auth()->user()->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlist_request_canceled');
        $logaction->save();
    
        $waitlist->cancelRequest($waitlist->id); 
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $waitlist;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification
        
        return redirect()->route('assets.requested')->withFragment('waitlist')
            ->with('success', 'Waitlist request canceled successfully.');
    }

    public function closeWaitlistRequest(Request $request, $waitlistId)
    {
        $waitlist = WaitList::findOrFail($waitlistId);
        $user = User::findOrFail($waitlist->user_id);
    
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($waitlist)) {
            return redirect()->back()->withFragment('waitlist')
                ->with('error', 'Waitlist item request not found.');
        }
    
        $logaction = new Actionlog();
        if ($waitlist->license_id) {
            $logaction->item_id = $waitlist->license_id;
        } else if ($waitlist->requestable_id){
            $logaction->item_id = $waitlist->requestable_id;
        } else if ($waitlist->component_id){
            $logaction->item_id = $waitlist->component_id;
        } else if ($waitlist->accessory_id){
            $logaction->item_id = $waitlist->accessory_id;
        } else if ($waitlist->consumable_id){
            $logaction->item_id = $waitlist->consumable_id;
        }
        
        if ($waitlist->license_id) {
            $logaction->item_type = License::class;
        } else if ($waitlist->requestable_id){
            $logaction->item_type = Asset::class;
        } else if ($waitlist->component_id){
            $logaction->item_type = Component::class;
        } else if ($waitlist->accessory_id){
            $logaction->item_type = Accessory::class;
        } else if ($waitlist->consumable_id){
            $logaction->item_id = $waitlist->consumable_id;
        }

        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }

        $logaction->target_id = $user->id;
        $logaction->user_id = auth()->user()->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlist_request_closed');
        $logaction->save();
    
        $waitlist->closeRequest($waitlist->id); 
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $waitlist;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification
        
        return redirect()->route('assets.requested')->withFragment('waitlist')
            ->with('success', 'Waitlist request closed.');
    }

    public function denyWaitlistRequest(Request $request, $waitlistId)
    {
        $waitlist = WaitList::findOrFail($waitlistId);
        $user = User::findOrFail($waitlist->user_id);
    
        // Check if the request exists and the user is authorized to cancel it
        if (is_null($waitlist)) {
            return redirect()->back()->withFragment('waitlist')
                ->with('error', 'Waitlist item request not found.');
        }
    
        $logaction = new Actionlog();
        if ($waitlist->license_id) {
            $logaction->item_id = $waitlist->license_id;
        } else if ($waitlist->requestable_id){
            $logaction->item_id = $waitlist->requestable_id;
        } else if ($waitlist->component_id){
            $logaction->item_id = $waitlist->component_id;
        } else if ($waitlist->accessory_id){
            $logaction->item_id = $waitlist->accessory_id;
        } else if ($waitlist->consumable_id){
            $logaction->item_id = $waitlist->consumable_id;
        }
        
        if ($waitlist->license_id) {
            $logaction->item_type = License::class;
        } else if ($waitlist->requestable_id){
            $logaction->item_type = Asset::class;
        } else if ($waitlist->component_id){
            $logaction->item_type = Component::class;
        } else if ($waitlist->accessory_id){
            $logaction->item_type = Accessory::class;
        } else if ($waitlist->consumable_id){
            $logaction->item_id = $waitlist->consumable_id;
        }

        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->user_id = auth()->user()->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlist_request_denied');
        $logaction->save();
    
        $waitlist->denyRequest($waitlist->id); 
    
        // Notify the user about the request cancellation
        $settings = Setting::getSettings();
        $data['item'] = $waitlist;
        $data['target'] = $user;
        $data['requested_date'] = Carbon::now();
        // Insert Notification
        
        return redirect()->route('assets.requested')->withFragment('waitlist')
            ->with('success', 'Waitlist request denied.');
    }
}