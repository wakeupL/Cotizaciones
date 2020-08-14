<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';
    
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
}
