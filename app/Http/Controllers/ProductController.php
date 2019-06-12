<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class ProductController extends Controller
{
   public function index()
    {
    	$products = Product::paginate(10);
 		return view('admin.products.index')->with(compact('products')); // listado
    }

    public function create()
    {
 		return view('admin.products.create'); //formulario de registro
    }

    public function store(Request $Request)
    {
    	//Registro de la base de datos
    	//dd($Request->all()); //dd() permite imprimir y terminar la ejecución del programa en ese instante

        $messages = [
                   'name.required' => 'Es necesario ingresar un nombre para el producto', 
                   'name.min' => 'El nombre del producto debe tener al menos dos caracteres',  
                   'description.required' => 'La descripción corta requerida',  
                   'description.max' => 'La descripción corta no puede ecceder de 200 caracteres',
                   'price.required' => 'Es obligario definir un precio',
                   'price.numeric' => 'Ingrese un precio válido',
                   'price.min' => 'No se admiten valores negativos'
        ];    


        // Validar
        $rules =[
                'name' => 'required|min:3',
                'description' => 'required|max:200',
                'price' => 'required|numeric|min:0'
        ];
        $this->validate($Request, $rules, $messages);//Si encuentra que una regla no se cumple nos redirije a la  misma página

    	$product = new Product();
    	$product->name =  $Request->input('name');
    	$product->description =  $Request->input('description');
    	$product->price =  $Request->input('price');
    	$product->long_description =  $Request->input('long_description');
    	$product->save();//EJECUTA UN INSERT

    	return redirect('admin/products');
    }

     public function edit($id)
    {
        //return "Mostrar aquí el formulario de edición para el producto con id  $id";    
        $product = Product::find($id);    
        return view('admin.products.edit')->with(compact('product')); //formulario de registro
    }

    public function update(Request $Request, $id)
    {




         $messages = [
                   'name.required' => 'Es necesario ingresar un nombre para el producto', 
                   'name.min' => 'El nombre del producto debe tener al menos dos caracteres',  
                   'description.required' => 'La descripción corta requerida',  
                   'description.max' => 'La descripción corta no puede ecceder de 200 caracteres',
                   'price.required' => 'Es obligario definir un precio',
                   'price.numeric' => 'Ingrese un precio válido',
                   'price.min' => 'No se admiten valores negativos'
        ];    


        // Validar
        $rules =[
                'name' => 'required|min:3',
                'description' => 'required|max:200',
                'price' => 'required|numeric|min:0'
        ];
        $this->validate($Request, $rules, $messages);//Si encuentra que una regla no se cumple nos redirije a la  misma página

        //Registro de la base de datos
        //dd($Request->all()); //dd() permite imprimir y terminar la ejecución del programa en ese instante
        $product =  Product::find($id); // Aquí lo que hace es buscar el producto con ese id
        $product->name =  $Request->input('name');
        $product->description =  $Request->input('description');
        $product->price =  $Request->input('price');
        $product->long_description =  $Request->input('long_description');
        $product->save();//EJECUTA UN UPDATE

        return redirect('admin/products');
    }



    public function destroy($id)
    {
        //Eliminar un registro
        
        $product =  Product::find($id); // Aquí lo que hace es buscar el producto con ese id
        $product->delete();//EJECUTA UN DELETE

        return back();
    }


}
