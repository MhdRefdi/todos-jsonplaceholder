<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTodolist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'completed',
        'user_id',
    ];

    protected $casts = [
        'title' => 'string',
        'completed' => 'boolean',
        'user_id' => 'integer',
    ];
}
