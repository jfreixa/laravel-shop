<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersItems extends Model
{
    protected $fillable = ['price', 'quantity', 'product_id', 'order_id'];

    public $timestamps = false;
}
