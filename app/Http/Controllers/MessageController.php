<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Conversation;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Message::class);

        return MessageResource::collection(Message::all());
    }

    public function store(MessageRequest $request)
    {
        $this->authorize('create', Message::class);

        $conversation = Conversation::find($request->conversation_id)->with('participants')->first();

        $pass = $conversation->participants->contains('user_id', auth()->id()) &&
        $conversation->participants->contains('user_id', $request->receiver_id) &&
        auth()->id() != $request->receiver_id &&
        $request->receiver_id != auth()->id();

        if(!$pass){
            return response()->json([
                'message' => 'You are not allowed to send message to this conversation'
            ], 403);
        }
        return new MessageResource(Message::create(
            array_merge($request->validated(), ['sender_id' => auth()->id()])
        ));
    }

    public function show(Message $message)
    {
        $this->authorize('view', $message);

        return new MessageResource($message);
    }

    public function update(MessageRequest $request, Message $message)
    {
        $this->authorize('update', $message);

        $message->update($request->validated());

        return new MessageResource($message);
    }

    public function destroy(Message $message)
    {
        $this->authorize('delete', $message);

        $message->delete();

        return response()->json();
    }
}
