<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes; // Esto es para el tem de eliminar un producto. Ver la migración de la tabla producto

     //$product->category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }


    //$product->images, para acceder a las imagenes de cada producto

    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

}
