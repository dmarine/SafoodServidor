<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model {
    public $timestamps = false;

    protected $table = 'restaurantes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'Nombre', 'Descripcion', 'Imagen'
    ];
}
