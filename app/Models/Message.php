<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $table = 'messages';
    protected $primaryKey = 'id';

    protected $fillable = [
        'message',
        'channel',
        'sender_id',
        'receiver_id',
        'created_at'
    ];

}
