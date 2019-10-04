<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = [
        'state', 'state_id', 'municipio', '', '', '', '', '',
    ];
    
    protected $casts = [ 'id' => 'string',];
}
