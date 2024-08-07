<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company',
        'name',
        'description',
        'requirements',
        'salary',
        'image',
        'status',
    ];
}
