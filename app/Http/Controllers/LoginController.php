<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;

class LoginController extends Controller
{
    public function getOtp(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users,email"
        ]);

        Login::updateOrCreate([
            "email" => $request->email,
        ], [
            "email" => $request->email,
            "otp" => rand(10000, 99999)
        ]);

        return response()->json([
            "message" => "OTP sent to your email"
        ], 201);
    }

    public function checkOtp(Request $request, Logger $logger)
    {
        $request->validate([
            "email" => "required|email",
            "otp" => "required|numeric"
        ]);

        $login = Login::where("email", $request->email)->firstOrFail();

        if ($login->otp == $request->otp) {
            $user = User::where("email", $request->email)->firstOrFail();
            $token = $user->createToken("auth_token")->plainTextToken;
            return response()->json([
                "token" => $token,
                "user" => UserResource::make($user),
            ], 200);
        }
        return response()->json([
            "message" => "OTP is incorrect"
        ], 400);
    }
}
