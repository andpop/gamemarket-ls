<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'photo_file', 'description'];

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

    public static function add($fields)
    {
        $product = new static;
        $product->fill($fields);
        $product->save();

        return $product;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
//        удалить фото товара
        $this->delete();
    }

    public function uploadPhoto($photo) {
        Storage::delete('uploads/'.$this->photo_file);
        $filename = str_random(10) . '.' . $photo->extension;
        $photo->saveAs('uploads', $filename);
        $this->photo_file = $filename;
        $this->save();
    }

    public function setCategory($id)
    {
        if ($id == null) {return;};
        $this->category_id = $id;
        $this->save();
    }

    public function getPhoto()
    {
        if ($this->photo_file == null)  {
            return '/img/no-image.jpg';
        }
        return '/uploads/'.$this->photo_file;
    }
}
