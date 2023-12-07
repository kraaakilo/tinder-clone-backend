<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'conversation_id',
        'sender_id',
        'receiver_id',
        'content',
        'type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
