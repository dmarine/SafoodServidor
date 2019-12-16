<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {
    public $timestamps = false;

    protected $table = 'restaurants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'description', 'image'
    ];
}
