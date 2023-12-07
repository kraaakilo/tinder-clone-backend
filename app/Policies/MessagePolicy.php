<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Message $message)
    {
    }

    public function create(User $user)
    {
        return auth()->check();
    }

    public function update(User $user, Message $message)
    {
    }

    public function delete(User $user, Message $message)
    {
    }

    public function restore(User $user, Message $message)
    {
    }

    public function forceDelete(User $user, Message $message)
    {
    }
}
