<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchUserRequest;
use App\Models\Conversation;
use App\Models\MatchUser;
use App\Models\Participant;

class MatchUserController extends Controller
{

    public function store(MatchUserRequest $request)
    {
        return response()->json([
            "isMatch" => false,
        ]);

        $this->authorize('create', MatchUser::class);

        if (auth()->id() == $request->get('matched_id')) {
            return response()->json(['message' => 'You cannot match yourself'], 422);
        }

        $matched = MatchUser::where('matched_id', $request->get('matched_id'))->where('matcher_id', auth()->id())->first();
        if ($matched) {
            return response()->json(['message' => 'Already matched'], 422);
        }

        $reverseMatched = MatchUser::where('matcher_id', $request->get('matched_id'))->where('matched_id', auth()->id())->first();
        if ($reverseMatched) {
            $conversation = Conversation::create([
                'type' => "private",
            ]);
            Participant::create([
                'user_id' => auth()->id(),
                'conversation_id' => $conversation->id,
            ]);
            Participant::create([
                'user_id' => $request->get('matched_id'),
                'conversation_id' => $conversation->id,
            ]);
            // notify users
        }

        MatchUser::create([
            'matcher_id' => auth()->id(),
            'matched_id' => $request->get('matched_id'),
        ]);

        return response()->json([
            "isMatch" => boolval($reverseMatched)
        ]);
    }
}
