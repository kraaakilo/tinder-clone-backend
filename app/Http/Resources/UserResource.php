<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "name" => $this->name,
            "gender" => $this->gender,
            "country" => code_to_country($this->country),
            "birthday" => $this->birthday,
            "age" => Carbon::parse($this->birthday)->diffInYears(Carbon::now()),
            "avatar"=> $this->photos()->first()->url,
            "photos" => $this->photos->pluck("url"),
            "passions" => $this->passions->pluck("name"),
        ];
    }
}
