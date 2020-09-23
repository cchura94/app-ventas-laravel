<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
use App\Producto;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return DB::select("select * from clientes");
        //return DB::table("clientes")->get();
        //$clientes = Cliente::All();
        $clientes = Cliente::orderby('id', 'desc')->paginate(5);
        //return view("admin.cliente.listar", ["clientes" => $clientes]);
        //return view("admin.cliente.listar")->with("clientes", $clientes);
        return view("admin.cliente.listar", compact("clientes"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.cliente.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones de lado del servidor
        $request->validate([
            "nombres" => "required|min:2|max:30",
            "apellidos" => "required|min:2|max:30",
            "ci_nit" => "unique:clientes|regex:/^\d{5,10}([\s-]\d[A-Z])?$/"
        ]);


        $clie = new Cliente;
        $clie->nombres = $request->nombres;
        $clie->apellidos = $request->apellidos;
        $clie->ci_nit = $request->ci_nit;
        $clie->telefono = $request->telefono;
        $clie->empresa = $request->empresa;
        $clie->save();

        return redirect("/admin/cliente")->with("ok", "El Cliente ha sido registrado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view("admin.cliente.mostrar", compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view("admin.cliente.editar", compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validaciones de lado del servidor
        $request->validate([
            "nombres" => "required|min:2|max:30",
            "apellidos" => "required|min:2|max:30",
            "ci_nit" => "regex:/^\d{5,10}([\s-]\d[A-Z])?$/"
        ]);

        $clie = Cliente::find($id);
        $clie->nombres = $request->nombres;
        $clie->apellidos = $request->apellidos;
        $clie->ci_nit = $request->ci_nit;
        $clie->telefono = $request->telefono;
        $clie->empresa = $request->empresa;
        $clie->save();

        return redirect("/admin/cliente")->with("ok", "El Cliente ha sido Modificado");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clie = Cliente::find($id);
        $clie->delete();
        return redirect("/admin/cliente")->with("ok", "El Cliente ha sido Eliminado");
    }

    public function obtenerClientes()
    {
        $clientes = Cliente::paginate(10);
        return response()->json($clientes);
    }

    public function agregarPedido($id)
    {
        $clie = Cliente::find($id);
        $productos = Producto::All(); 
        return view("admin.cliente.nuevo_pedido", compact('clie', 'productos'));
    }
}
