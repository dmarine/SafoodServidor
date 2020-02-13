<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Food as Food;

class Restaurant extends Model {
    public $timestamps = false;

    protected $table = 'restaurants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'description', 'image'
    ];

    public function foods() {
        return $this->hasMany(Food::class);
    }
}