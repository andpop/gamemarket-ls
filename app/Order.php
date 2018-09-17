<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_full_name', 'email', 'product_id'];

    public static function add($fields)
    {
        $order = new static;
        $order->fill($fields);
        $order->save();

        return $order;
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
