<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'name', 'email', 'slug',
        'address', 'phone', 'total', 'state', 'note'
    ];
}