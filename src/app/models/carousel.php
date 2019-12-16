<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class carousel extends Model
{
    protected $table="carousels";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'image'
    ];
}
