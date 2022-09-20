<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateCatalogo extends Model
{
    protected $table = 'catalogos'; 

    // public function scopeBuscador($query, $nombreProducto) {
    //     return $query->where('nombreProducto', 'LIKE', '%$nombreProducto%');
    // }
}
