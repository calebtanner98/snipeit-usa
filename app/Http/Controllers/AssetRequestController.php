<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WaitList;
use App\Models\Asset;
use App\Models\Actionlog;
use App\Models\Setting;
use Carbon\Carbon;

class AssetRequestController extends Controller
{
    public function waitlistAssetRequest(Request $request, $asset_id)
    {
        $asset = Asset::findOrFail($asset_id);
        $user = auth()->user();

        $waitlistRecord = WaitList::create([
            'requestable_id' => $asset->id,
            'quantity' => 1,
            'user_id' => $user->id,
        ]);

        $logaction = new Actionlog();
        $logaction->item_id = $asset_id;
        $logaction->item_type = Asset::class;
        $logaction->created_at = Carbon::now();
        if ($user->location_id) {
            $logaction->location_id = $user->location_id;
        }
        $logaction->target_id = $user->id;
        $logaction->target_type = User::class;
        $logaction->logaction('waitlisted_asset');
        $logaction->save();
    
        return redirect()->route('requestable-assets')->withFragment('assets')
        ->with('success', 'Success! Added to the waitlist for this asset.');
    }
}