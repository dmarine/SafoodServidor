<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class restaurants_foods extends Model
{  public $timestamps = false;

    protected $table = 'restaurants_foods';
    protected $primaryKey = 'id';
    protected $fillable = [
        'restaurant_id','foods_id'
    ];
}
