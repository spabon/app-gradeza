<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Product;
use App\ProductImage;



class ImageController extends Controller
{
    
	public function index($id)
	{
		$product = Product::find($id);
		$images = $product->images;
		return view('admin.products.images.index')->with(compact('product','images'));
	}

	public function store(Request $request, $id)
	{
			//Guardar la imagen en el proyecto
		
		$file = $request->file('photo');
		$path = public_path() . '/images/products';
		$fileName = uniqid() . $file->getClientOriginalName();//Se crea el nombre del archivo con un id unico mas el nombre orirginal del archivo
		$file->move($path, $fileName);

		// Crear un registro en la base de datos product_images

		$productImage = new ProductImage();
		$productImage->image = $fileName;
		//$productImage->feature = 
		$productImage->product_id = $id;
		$productImage->save();// realiza el INSERT

		return back();
	}

	public function destroy()
	{

	}

}
