<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'completed',
    ];

    protected $casts = [
        'title' => 'string',
        'completed' => 'boolean',
    ];
}
