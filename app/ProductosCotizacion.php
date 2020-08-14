<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosCotizacion extends Model
{
    protected $table = 'productos_cotizacion';
  
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
}
