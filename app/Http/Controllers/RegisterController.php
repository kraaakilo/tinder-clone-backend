<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Passion;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $passions = explode(",", $request->get('passions'));
        foreach ($passions as $passion) {
            Passion::create([
                'user_id' => $user->id,
                'name' => $passion,
            ]);
        }
        $token = $user->createToken("auth_token")->plainTextToken;
        return response()->json(compact("token"), 201);

    }
}
