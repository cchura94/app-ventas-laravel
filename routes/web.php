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
    return view('welcome');
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

Route::get("/producto/{id}", "ProductoController@mostrar");

//Controlador con recursos
Route::resource("/categoria", "CategoriaController");
