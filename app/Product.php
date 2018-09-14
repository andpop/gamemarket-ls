<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Получить запись о категории, к которой принадлежит товар
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
//        Полная запись
//        return $this->hasOne(Category::class,   'category_id', 'id');
        return $this->hasOne(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
