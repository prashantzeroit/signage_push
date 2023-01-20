<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'status',
        'content',
        'created_at',
        'updated_at',
    ];
}
