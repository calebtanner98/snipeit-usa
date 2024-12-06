<?php

namespace App\Policies;

use App\Models\Accessory;
use App\Models\User;

class AccessoryPolicy extends CheckoutablePermissionsPolicy
{
    protected function columnName()
    {
        return 'accessories';
    }

    public function viewRequestable(User $user)
    {
        return $user->hasAccess('accessories.requestable.view');
    }
}
