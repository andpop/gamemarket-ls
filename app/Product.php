<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'photo', 'description'];

    /**
     * Получить запись о категории, к которой принадлежит товар
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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
        $this->removePhoto();
        $this->delete();
    }

    public function removePhoto()
    {
        if($this->photo != null)
        {
            Storage::delete('uploads/' . $this->photo);
        }
    }

    public function uploadPhoto($photo) {
        if($photo == null) { return; }

        $this->removePhoto();
        $filename = str_random(10) . '.' . $photo->extension();
        $photo->storeAs('uploads', $filename);
        $this->photo = $filename;
        $this->save();
    }

    public function getPhoto()
    {
        if($this->photo == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->photo;
    }

    public function setCategory($id)
    {
        if ($id == null) {
            return;
        };
        $this->category_id = $id;
        $this->save();
    }

    public function getCategoryName()
    {
        return ($this->category != null)
            ?   $this->category->name
            :   'Нет категории';
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }


}
