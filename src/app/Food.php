<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {
    public $timestamps = false;

    protected $table = 'foods';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'description', 'image', 'category_id','allergen_id','restaurant_id'
    ];
}
