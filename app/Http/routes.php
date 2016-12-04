<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route:: resource ('categoria','CategoriaController');

Route:: resource ('clientes', 'ClienteController');

Route:: resource ('mesas', 'MesaController');

Route:: resource ('productos', 'ProductoController');

// route::get('categoria/{ID}/edit','CategoriaController@edit');

Route:: get ('categoria/{ID}/destroy',[
          'uses'=> 'CategoriaController@destroy',
          'as'=>'categoria.destroy'
         ]);

Route:: get ('clientes/{ID}/destroy',[
          'uses'=> 'ClienteController@destroy',
          'as'=>'clientes.destroy'
         ]);

Route:: get ('mesas/{ID}/destroy',[
          'uses'=> 'MesaController@destroy',
          'as'=>'mesas.destroy'
          ]);

Route:: get ('productos/{ID}/destroy',[
          'uses'=> 'ProductoController@destroy',
          'as'=>'productos.destroy'
          ]);
