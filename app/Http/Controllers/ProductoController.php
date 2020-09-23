<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // 
use App\Producto;

class ProductoController extends Controller
{
    public function listar()
    {
        $productos = Producto::paginate(10);
        return view("admin.producto.listar", compact('productos'));
    }

    public function nuevo()
    {
        return view("admin.producto.crear");
    }

    public function guardar(Request $request)
    {
        $request->validate([
            "nombre" => "required|min:3|max:200",
            "precio" => "required"
        ]);

        $nombre_imagen = '';
        // subir la imagen
        if($file = $request->file('imagen')){
            //obtener el nombre de la imagen
            $nombre_imagen = $file->getClientOriginalName();
            $file->move("imagenes", $nombre_imagen);
        }

        $prod = new Producto;
        $prod->nombre = $request->nombre;
        $prod->precio = $request->precio;
        $prod->cantidad = $request->cantidad;
        $prod->detalle = $request->detalle;
        $prod->imagen = $nombre_imagen;
        $prod->save();

        return redirect("/admin/producto")->with("ok", "Producto Registrado");
    }

    public function mostrar($id)
    {
        return "Mostrando : " . $id;
    }

    public function editar($id)
    {
        return view("admin.producto.editar");
    }

    public function modificar(Request $request, $id)
    {
        return $request;
    }

    public function eliminar($id)
    {
        return "Eliminando... $id";
    }
}
