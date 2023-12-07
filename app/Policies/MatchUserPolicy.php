<?php

namespace App\Policies;

use App\Models\MatchUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MatchUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, MatchUser $matchUser)
    {
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, MatchUser $matchUser)
    {
    }

    public function delete(User $user, MatchUser $matchUser)
    {
    }

    public function restore(User $user, MatchUser $matchUser)
    {
    }

    public function forceDelete(User $user, MatchUser $matchUser)
    {
    }
}
