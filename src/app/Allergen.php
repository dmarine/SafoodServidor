<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model {
    public $timestamps = false;

    protected $table = 'allergens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name'
    ];
}
