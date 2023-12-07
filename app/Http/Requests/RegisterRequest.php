<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => ['required'],
            'email' => ['required', 'email','unique:users'],
            'country' => ['required'],
            'name' => ['required'],
            'gender' => ['required'],
            'birthday' => ['required'],
            'passions' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
