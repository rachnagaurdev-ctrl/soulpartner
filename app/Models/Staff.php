<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['name', 'position', 'description', 'image', 'category','linkdin_link','slug'];
}
