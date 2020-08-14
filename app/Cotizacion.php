<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizacion';
    
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
}
