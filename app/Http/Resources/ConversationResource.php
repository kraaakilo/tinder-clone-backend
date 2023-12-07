<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Conversation */
class ConversationResource extends JsonResource
{
    public function toArray(Request $request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'participants' => array($this->whenLoaded(
                'participants',
                fn () => (UserResource::make(
                         $this->participants()->where('user_id', "!=", auth()->id())->first()->user
                    )->only(['id', 'name', 'email', 'avatar'])))
            ),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
