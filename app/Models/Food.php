<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category as Category;
use App\Models\Restaurant as Restaurant;
use App\Models\Allergen as Allergen;

class Food extends Model {
    public $timestamps = false;

    protected $table = 'foods';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'description', 'image', 'category_id', 'restaurant_id', 'price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function allergens() {
        return $this->belongsToMany(Allergen::class, 'foods_allergens', 'food_id', 'allergen_id');
    }
}
