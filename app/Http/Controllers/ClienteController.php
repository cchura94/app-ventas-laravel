<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;
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
        $clientes = Cliente::All();
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
        $request->validate([
            "nombres" => "required|min:2|max:30",
            "nombres" => "required|min:2|max:30",
            "ci_nit" => "unique:clientes|regex:/^\d{5,10}([\s-]\d[A-Z])?$/"
        ]);


        $clie = new Cliente;
        $clie->nombres = $request->nombres;
        $clie->apellidos = $request->apellidos;
        $clie->ci_nit = $request->ci_nit;
        $clie->telefono = $request->telefono;
        $clie->empresa = $request->empresa;
        $clie->save();

        return redirect("/cliente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
