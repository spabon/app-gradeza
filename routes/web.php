<?php


Route::get('/', 'Tescontroller@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware(['auth','admin'])->prefix('admin')->group(function(){ //Este es el Middleware que valida el acceso a las diferentes rutas middleware(['auth','admin']) el parametro auth está declarado en el AdminMiddleware

		Route::get('/products', 'ProductController@index'); //listará.  ProductController será el controlador
		Route::get('/products/create', 'ProductController@create'); // Crear nuevos productos
		Route::post('/products', 'ProductController@store'); //Crear
		Route::get('/products/{id}/edit', 'ProductController@edit'); //Crear
		Route::post('/products/{id}/edit', 'ProductController@update'); //Actualizar
		Route::delete('/products/{id}', 'ProductController@destroy'); //Eliminar

		Route::get('/products/{id}/images', 'ImageController@index'); //Eliminar
		Route::post('/products/{id}/images', 'ImageController@store'); //Eliminar
		Route::delete('/products/{id}/images', 'ImageController@destroy'); //Eliminar
});

 