<?php

namespace App\Policies;
use App\Models\User;
use App\Models\Component;

class ComponentPolicy extends CheckoutablePermissionsPolicy
{
    protected function columnName()
    {
        return 'components';
    }

    public function viewRequestable(User $user)
    {
        return $user->hasAccess('components.requestable.view');
    }
}