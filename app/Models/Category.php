<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Food as Food;

class Category extends Model {
    public $timestamps = false;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name'
    ];

    public function foods() {
        return $this->hasMany(Food::class);
    }
}