<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCall extends Model
{
    protected $fillable = [
        'booking_id',
        'caller_id',
        'receiver_id',
        'status',
        'offer',
        'answer',
        'caller_candidates',
        'receiver_candidates'
    ];

    protected $casts = [
        'caller_candidates' => 'array',
        'receiver_candidates' => 'array',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
