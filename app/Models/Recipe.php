<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'ingredients' => 'array',
        'tools' => 'array',
        'steps' => 'array',
    ];
}