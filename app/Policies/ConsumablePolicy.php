<?php

namespace App\Policies;
use App\Models\User;
use App\Models\Consumable;

class ConsumablePolicy extends CheckoutablePermissionsPolicy
{
    protected function columnName()
    {
        return 'consumables';
    }

    public function viewRequestable(User $user)
    {
        return $user->hasAccess('consumables.requestable.view');
    }
}