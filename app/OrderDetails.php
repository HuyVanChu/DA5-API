<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = "users";
    protected $fillable = [
        'name', 'price', 'quantity', 'image',
        'order_id'
    ];
}