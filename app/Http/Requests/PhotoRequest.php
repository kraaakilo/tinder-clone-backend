<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer'],
            'url' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
