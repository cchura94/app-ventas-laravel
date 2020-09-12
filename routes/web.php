<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/contactanos', function () {
    return view('contacto');
});

Route::get('/acercade', function () {
    return view('nosotros');
});

// Rutas con funciones cerradas (anónimas)
Route::get("/saludo", function(){
    echo "Bienvenidos a las rutas de Laravel";
});

Route::get("/saludo2", function(){
    return "Bienvenidos a las rutas de Laravel 2";
});

Route::get("/lenguajes", function(){
    return ["java", "PHP", "C#", "Python"];
});

Route::get("/nombre/{nombre}", function($nom){
    return ["nombre" => $nom];
});

Route::get("/nombre/{nombre}/edad/{ed}", function($nom, $edad){
    return ["nombre" => $nom, "edad" => $edad];
});

// Rutas conectados a Controladores
Route::get("/producto", "ProductoController@listar");
// Cargar el formulario de producto
Route::get("/producto/crear", 'ProductoController@nuevo');
// Guardar Datos de producto
Route::post("/producto", "ProductoController@guardar");
//Ruta para Mostrar un producto
Route::get("/producto/{id}", "ProductoController@mostrar");

//Ruta para cargar un formulario de edicion
Route::get("/producto/{id}/editar", "ProductoController@editar");
//Ruta para modificar un recurso
Route::put("/producto/{id}", "ProductoController@modificar");

// Para Eliminar un recurso de Producto
Route::delete("/producto/{id}", "ProductoController@eliminar");

//Controlador con recursos
Route::resource("/categoria", "CategoriaController");
Route::resource("cliente", "ClienteController");
Route::resource("pedido", "PedidoController");
Route::resource("usuario", "UsuarioController");
