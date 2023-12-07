<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Photo */
class PhotoResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'url' => $this->url,
        ];
    }
}
