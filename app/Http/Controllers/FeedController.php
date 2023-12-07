<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index(Request $request)
    {
        $others = User::where('id', '!=', $request->user()->id)
                ->where("gender", "!=", $request->user()->gender)
                ->where("country", $request->user()->country)
                ->whereNotIn('id', $request->user()->matchedUsers->pluck('matched_id')->toArray())
                ->get();

        return UserResource::collection($others);
    }
}
