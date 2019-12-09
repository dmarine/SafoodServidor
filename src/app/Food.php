<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model {
    public $timestamps = false;

    protected $table = 'comidas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'Nombre', 'Descripcion', 'Imagen', 'idCategoria'
    ];
}
