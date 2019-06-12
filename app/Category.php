<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Category->products
    public function products()
    {
    	return $this->hasMany(Product::class);//Así se define que una categoría tiene muchos productos
    }
}
