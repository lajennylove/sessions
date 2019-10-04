<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = [
        'username', 'name', 'gender', 'description', 'avatar_url', 'cover_url', 'youtube_url', 'ciudad', 'spotify', 'bandcamp', 'user_id', 'is_accepted', 'facebook', 'youtube', '', '', 
    ];
}
