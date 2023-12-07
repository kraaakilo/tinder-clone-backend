<?php

namespace App\Policies;

use App\Models\Interest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InterestPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Interest $interest)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Interest $interest)
    {
    }

    public function delete(User $user, Interest $interest)
    {
    }

    public function restore(User $user, Interest $interest)
    {
    }

    public function forceDelete(User $user, Interest $interest)
    {
    }
}
