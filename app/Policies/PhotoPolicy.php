<?php

namespace App\Policies;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Photo $photo)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Photo $photo)
    {
    }

    public function delete(User $user, Photo $photo)
    {
    }

    public function restore(User $user, Photo $photo)
    {
    }

    public function forceDelete(User $user, Photo $photo)
    {
    }
}
