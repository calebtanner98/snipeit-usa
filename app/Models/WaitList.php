<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Notifications\WaitlistRequestCanceledNotification;
use App\Notifications\WaitlistRequestClosedNotification;
use App\Notifications\WaitlistRequestDeniedNotification;


class WaitList extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'waitlist';
    protected $fillable = ['user_id', 'requestable_id', 'license_id', 'quantity', 'canceled_at', 'deleted_at', 'accessory_id', 'consumable_id', 'component_id', 'created_at', 'updated_at', 'closed_at', 'denied_at'];

    public function isOnWaitLicenseList($user, $licenseId) {

        return $this->where('user_id', $user->id)->where('license_id', $licenseId)->whereNull('canceled_at')->whereNull('closed_at')->whereNull('denied_at')->exists();

    }

    public function isOnAccessoryWaitList($user, $accessory_id) {

        return $this->where('user_id', $user->id)->where('accessory_id', $accessory_id)->whereNull('canceled_at')->whereNull('closed_at')->whereNull('denied_at')->exists();
        
    }

    public function isOnComponentWaitList($user, $component_id) {

        return $this->where('user_id', $user->id)->where('component_id', $component_id)->whereNull('canceled_at')->whereNull('closed_at')->whereNull('denied_at')->exists();
        
    }

    public function isOnAssetWaitList($user, $asset_id) {

        return $this->where('user_id', $user->id)->where('requestable_id', $asset_id)->whereNull('canceled_at')->whereNull('closed_at')->whereNull('denied_at')->exists();
        
    }

    public function isOnConsumableWaitList($user, $consumable_id) {

        return $this->where('user_id', $user->id)->where('consumable_id', $consumable_id)->whereNull('canceled_at')->whereNull('closed_at')->whereNull('denied_at')->exists();
        
    }

    /**
     * Relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }

    public function accessory()
    {
        return $this->belongsTo(Accessory::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function consumable()
    {
        return $this->belongsTo(Consumable::class);
    }

    public function requestable()
    {
        return $this->belongsTo(Asset::class, 'requestable_id'); 
    }

    public function cancelRequest($waitlistId)
    {
        $waitlistRequest = $this->where('id', $waitlistId)->first();
    
        if ($waitlistRequest) {
            $waitlistRequest->update([
                'canceled_at' => Carbon::now(), 
            ]);
        }

        // $itemType = $waitlistRequest->itemType();
        // $itemName = $this->getItemNameByType($itemType, $waitlistRequest);

        // $waitlistRequest->user->notify(new WaitlistRequestCanceledNotification($itemName));
    }

    public function closeRequest($waitlistId)
    {
        $waitlistRequest = $this->where('id', $waitlistId)->first();
    
        if ($waitlistRequest) {
            $waitlistRequest->update([
                'closed_at' => Carbon::now(),
            ]);        
        }

        // $itemType = $waitlistRequest->itemType();
        // $itemName = $this->getItemNameByType($itemType, $waitlistRequest);

        // $waitlistRequest->user->notify(new WaitlistRequestClosedNotification($itemName));
    }

    public function denyRequest($waitlistId)
    {
        $waitlistRequest = $this->where('id', $waitlistId)->first();
        
        if ($waitlistRequest) {

            $waitlistRequest->update([
                'denied_at' => Carbon::now(),
            ]);
    
            // $itemType = $waitlistRequest->itemType();
            // $itemName = $this->getItemNameByType($itemType, $waitlistRequest);
    
            // $waitlistRequest->user->notify(new WaitlistRequestDeniedNotification($itemName));
        }
    }
    
    public function getItemNameByType($itemType, $waitlistRequest)
    {
        switch ($itemType) {
            case 'asset':
                return $waitlistRequest->requestable->name ?? 'Unknown Asset';
            case 'license':
                return $waitlistRequest->license->name ?? 'Unknown License';
            case 'accessory':
                return $waitlistRequest->accessory->name ?? 'Unknown Accessory';
            case 'component':
                return $waitlistRequest->component->name ?? 'Unknown Component';
            case 'consumable':
                return $waitlistRequest->consumable->name ?? 'Unknown Consumable';
            default:
                return 'Unknown Item';
        }
    }

    public function itemType()
    {
        if ($this->requestable_id) {
            return 'asset';
        } elseif ($this->license_id) {
            return 'license';
        } elseif ($this->accessory_id) {
            return 'accessory';
        } elseif ($this->component_id) {
            return 'component';
        } elseif ($this->consumable_id) {
            return 'consumable';
        }

        return null;
    }
}