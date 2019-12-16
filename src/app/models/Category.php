<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    public $timestamps = false;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name'
    ];
}
