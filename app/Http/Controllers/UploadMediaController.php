<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class UploadMediaController extends Controller
{
    public function store(Request $request)
    {
        if (!$request->hasFile('photos')) {
            return response()->json(['message' => 'upload_file_not_found'], 400);
        }
        foreach ($request->file('photos') as $photo) {
            Photo::create([
                'user_id' => $request->user()->id,
                'url' => $photo->store('photos'),
            ]);
        }
        return response()->json(["message" => "Photos added"], 201);

    }
}
