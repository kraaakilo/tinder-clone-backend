<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'user_id',
        'url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => config('app.url') . $value,
            /*get: fn (string $value) => config('app.url'). $value,*/
        );
    }
}
