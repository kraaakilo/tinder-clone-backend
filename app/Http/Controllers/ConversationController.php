<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConversationRequest;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Models\Conversation;
use App\Models\Participant;

class ConversationController extends Controller
{
    public function index()
    {
        $participations = Participant::where('user_id', auth()->id())->pluck('conversation_id');
        $conversations = Conversation::whereIn('id', $participations)->with('participants')->paginate();
        return ConversationResource::collection($conversations);
    }

    public function store(ConversationRequest $request)
    {
        $this->authorize('create', Conversation::class);

        return new ConversationResource(Conversation::create($request->validated()));
    }

    public function show(Conversation $conversation)
    {
        $this->authorize('view', $conversation);
        return MessageResource::collection($conversation->messages()->orderBy('id','DESC')->paginate());
    }

    public function update(ConversationRequest $request, Conversation $conversation)
    {
        $this->authorize('update', $conversation);

        $conversation->update($request->validated());

        return new ConversationResource($conversation);
    }

    public function destroy(Conversation $conversation)
    {
        $this->authorize('delete', $conversation);

        $conversation->delete();

        return response()->json();
    }
}
