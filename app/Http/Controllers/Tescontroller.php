<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;

class Tescontroller extends Controller
{
    public function welcome()
    {
    	$products = Product::all(); //Recibimos  los productos
    	return view('welcome')->with(compact('products')); // Los inyectamos a la vista en forma de aaray con compact()
    }
}
   