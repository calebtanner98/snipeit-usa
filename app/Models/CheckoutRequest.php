<?php

// Modified by USA Team to account for licenses and assets

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckoutRequest extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'requestable_id',          // Allow mass assignment for assets
        'license_id',        
        'accessory_id',
        'component_id',
        'consumable_id',
        'seats_requested',   // Number of seats requested for licenses
        'requestable_type',
        'canceled_at',
        'checkedin_at',
        'quantity',
        'cancel_reason',
    ];
    protected $table = 'checkout_requests';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requestingUser()
    {
        return $this->user()->withTrashed()->first();
    }

    public function requestedItem()
    {
        return $this->morphTo('requestable');
    }

    // Determine the item requested
    public function itemRequested()
    {
        if ($this->requestable_id) {
            return $this->requestedItem()->first();
        } elseif ($this->license_id) {
            return $this->requestedItem()->first();
        } elseif ($this->accessory_id) {
            return $this->requestedItem()->first();
        } elseif ($this->component_id) {
            return $this->requestedItem()->first();
        } elseif ($this->consumable_id) {
            return $this->requestedItem()->first();
        }

        return null;
    }

    // Return the type of item (asset or license)
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

    public function location()
    {
        return $this->itemRequested()->location;
    }

    public function name()
    {
        $item = $this->itemRequested();

        if ($item && $this->itemType() == 'asset') {
            return $item->present()->name();
        } elseif ($item && $this->itemType() == 'license') {
            return $item->name;
        } elseif ($item && $this->itemType() == 'component') {
            return $item->name;
        } elseif ($item && $this->itemType() == 'accessory') {
            return $item->name;
        } elseif ($item && $this->itemType() == 'consumable') {
            return $item->name;
        }

        return null;
    }

    public function asset() {
        return $this->belongsTo(Asset::class);
    }

    // New relationship for licenses
    public function license() {
        return $this->belongsTo(License::class);
    }

    // New relationship for accessory
    public function accessory() {
        return $this->belongsTo(Accessory::class);
    }

    // New relationship for component
    public function component() {
        return $this->belongsTo(Component::class);
    }

    // New relationship for component
    public function consumable() {
        return $this->belongsTo(Consumable::class);
    }
}