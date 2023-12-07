<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MatchUserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploadMediaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return response()->json(["message" => "Service is running!"]);
});

Route::post("/register", [RegisterController::class, "store"]);

Route::get("/get-otp", [LoginController::class, "getOtp"]);
Route::get("/check-otp", [LoginController::class, "checkOtp"]);


Route::middleware("auth:sanctum")->group(function () {
    Route::get("/me", [UserController::class, "me"]);
    Route::get("/chats", [ConversationController::class, "index"]);
    Route::get("/chats/{conversation}", [ConversationController::class, "show"]);

    Route::post("/message", [MessageController::class, "store"]);

    Route::get("/feed", [FeedController::class, "index"]);
    Route::post("/upload-photos", [UploadMediaController::class, "store"]);
    Route::post("/match", [MatchUserController::class, "store"]);
});
