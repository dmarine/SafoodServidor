<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model {
    public $timestamps = false;

    protected $table = 'allergens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name'
    ];

    public function foods() {
        return $this->belongsToMany(Allergen::class, 'foods_allergens', 'food_id', 'allergen_id');
    }
}
