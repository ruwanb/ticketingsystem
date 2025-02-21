<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /** @use HasFactory<\Database\Factories\ReplyFactory> */
    use HasFactory;

    protected $fillable = [ 
        'ticket_id',
        'reply',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
