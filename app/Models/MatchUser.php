<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchUser extends Model
{
    protected $fillable = [
        'matcher_id',
        'matched_id',
    ];
}
