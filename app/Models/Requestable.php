<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;

// $asset->requests
// $asset->isRequestedBy($user)
// $asset->whereRequestedBy($user)
trait Requestable
{
    public function requests()
    {
        return $this->morphMany(CheckoutRequest::class, 'requestable')
                    ->whereNull('canceled_at')
                    ->whereNull('fulfilled_at')
                    ->whereNull('checkedin_at');
    }

    public function isRequestedBy($user)
    {
        return $this->requests()->where('user_id', $user->id)
                    ->whereNull('canceled_at')
                    ->whereNull('fulfilled_at')
                    ->whereNull('checkedin_at')
                    ->exists();
    }

    public function scopeRequestedBy($query, User $user)
    {
        return $query->whereHas('requests', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    public function request($qty = 1)
    {
        $this->requests()->save(
            new CheckoutRequest(['user_id' => Auth::id(), 'qty' => $qty])
        );
    }

    public function deleteRequest()
    {
        $this->requests()->where('user_id', Auth::id())->delete();
    }

    public function cancelRequest($user_id = null)
    {
        if (!$user_id){
            $user_id = Auth::id();
        }

        $this->requests()->where('user_id', $user_id)->update(['canceled_at' => \Carbon\Carbon::now()]);
    }
}