<?php

namespace App\Policies;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParticipantPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Participant $participant)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Participant $participant)
    {
    }

    public function delete(User $user, Participant $participant)
    {
    }

    public function restore(User $user, Participant $participant)
    {
    }

    public function forceDelete(User $user, Participant $participant)
    {
    }
}
