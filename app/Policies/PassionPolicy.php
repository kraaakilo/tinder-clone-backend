<?php

namespace App\Policies;

use App\Models\Passion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PassionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Passion $passion)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Passion $passion)
    {
    }

    public function delete(User $user, Passion $passion)
    {
    }

    public function restore(User $user, Passion $passion)
    {
    }

    public function forceDelete(User $user, Passion $passion)
    {
    }
}
