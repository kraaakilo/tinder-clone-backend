<?php

namespace App\Http\Resources;

use App\Models\MatchUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin MatchUser */
class MatchUserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'matcher_id' => $this->matcher_id,
            'matched_id' => $this->matched_id,
        ];
    }
}
