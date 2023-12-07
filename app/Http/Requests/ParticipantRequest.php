<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
{
    public function rules()
    {
        return [
            'conversation_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
