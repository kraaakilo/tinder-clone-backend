<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConversationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['nullable'],
            'type' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
