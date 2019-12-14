<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrousel_image extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'image'
    ];
}
