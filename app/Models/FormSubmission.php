<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    protected $fillable = [
        'form_id',
        'data',
        'metadata',
    ];

    protected $casts = [
        'data' => 'array',
        'metadata' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
