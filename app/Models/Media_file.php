<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_file extends Model
{
    use HasFactory;
     protected $fillable = [
       'user_id',
       'name',
       'url',
       'type',
       'playlist_type',
       'playlist_id',
       'status',
     ];
}
