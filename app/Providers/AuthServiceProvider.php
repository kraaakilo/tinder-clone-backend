<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Conversation;
use App\Models\Interest;
use App\Models\MatchUser;
use App\Models\Message;
use App\Models\Participant;
use App\Models\Passion;
use App\Models\Photo;
use App\Policies\ConversationPolicy;
use App\Policies\InterestPolicy;
use App\Policies\MatchUserPolicy;
use App\Policies\MessagePolicy;
use App\Policies\ParticipantPolicy;
use App\Policies\PassionPolicy;
use App\Policies\PhotoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Conversation::class => ConversationPolicy::class,
        Message::class => MessagePolicy::class,
        Participant::class => ParticipantPolicy::class,
        Interest::class => InterestPolicy::class,
        Photo::class => PhotoPolicy::class,
        Passion::class => PassionPolicy::class,
        MatchUser::class => MatchUserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
