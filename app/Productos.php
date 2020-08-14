<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $casts = [
    'created_at' => 'datetime:Y-m-d',
];
}
