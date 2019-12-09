<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    public $timestamps = false;

    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'Nombre', 'Descripcion'
    ];
}
