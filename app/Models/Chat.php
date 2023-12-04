<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'message',
    ];

    public function userChats(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function roomChats(): BelongsTo
    {
        return $this->belongsTo(User::class, 'room_id');
    }
}
