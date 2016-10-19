<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saves extends Model
{
    protected $table = 'saves';
    protected $fillable = array(
        'user',
        'status',
        'version',
        'idUser'
    );
}
