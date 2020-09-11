<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // 

class ProductoController extends Controller
{
    public function listar()
    {
        return "Lista de Producto";
    }

    public function nuevo()
    {
        return view("admin.producto.crear");
    }

    public function guardar(Request $request)
    {
        echo "GUARDANDO...";
        return $request;
    }

    public function mostrar($id)
    {
        return "Mostrando : " . $id;
    }
}
