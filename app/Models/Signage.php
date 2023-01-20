<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'device',
        'playlist_id',
        'pin',
        'zip',
        'expiry',
        'last_pinged',
    ];
}
