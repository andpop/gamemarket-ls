<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
//        Полностью
//        return $this->hasMany(Product::class, 'category_id');
        return $this->hasMany(Product::class);
    }
}
