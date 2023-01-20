<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edit_schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'playlist_id',
        'user_id',
        'signage_id',
    ];

    public function playlist(){
        return $this->hasOne(Playlist::class,'id','playlist_id');
    }
}
