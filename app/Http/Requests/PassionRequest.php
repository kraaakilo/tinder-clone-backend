<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'name' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
