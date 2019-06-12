<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	/*factory(Category::class, 5)->create(); // Creará categorias
        factory(Product::class, 100)->create(); // Creará productos
        factory(ProductImage::class, 200)->create(); //Creará 200 imagenes aleatoriamente*/
        //-----------------------------------------------------------------------------------
        $categories = factory(Category::class, 5)->create(); //Primero se crean las 5 categorias
        $categories->each(function($category){ //La variable que se pasa pudo ser cualquera
            $products = factory(Product::class, 20)->make();//Se crean los 20 productos
            $category->products()->saveMany($products);//Se guarda en la base de datos por la relación entre productos y Categorías. saveMany() registra varios productos

            //Se asignan las imagenes a cada producto creado
            $products->each(function($p){
            $images = factory(ProductImage::class, 5)->make();
            $p->images()->saveMany($images);
            });
      });    

        /*
        
        

        */
       //------------------------------------------------------------------------------------- 

        /*
        $users = factory(App\User::class, 3)
           ->create()
           ->each(function ($user) {
                $user->posts()->save(factory(App\Post::class)->make());
            });*/


    }
}
