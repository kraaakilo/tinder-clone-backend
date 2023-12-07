<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'conversation_id' => ['required', 'integer',"exists:conversations,id"],
            'receiver_id' => ['nullable', 'integer',"exists:users,id"],
            'content' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
