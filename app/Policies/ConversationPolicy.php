<?php

namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Conversation $conversation)
    {
        return $conversation->participants->contains('user_id', $user->id);
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Conversation $conversation)
    {
    }

    public function delete(User $user, Conversation $conversation)
    {
    }

    public function restore(User $user, Conversation $conversation)
    {
    }

    public function forceDelete(User $user, Conversation $conversation)
    {
    }
}
