<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'matched_id' => ['required',"integer","exists:users,id"]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
