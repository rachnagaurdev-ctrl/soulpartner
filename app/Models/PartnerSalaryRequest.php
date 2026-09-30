<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSalaryRequest extends Model
{
    protected $fillable = [
        'user_id',
        'request_type',
        'status',
        'admin_notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
