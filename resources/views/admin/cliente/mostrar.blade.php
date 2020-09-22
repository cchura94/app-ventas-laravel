@extends('layouts.admin')

@section('contenedor')
<h1>Mostrar Cliente</h1>


    <div class="row">
        <div class="col-md-6">
            <label for="">Nombres</label>
            <input type="text" required name="nombres" class="form-control" value="{{ $cliente->nombres }}" disabled>
    
        </div>
        <div class="col-md-6">
            <label for="">Apellidos</label>
            <input type="text" required name="apellidos" class="form-control"  value="{{ $cliente->apellidos }}" disabled>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="">CI / NIT</label>
            <input type="text"  name="ci_nit" class="form-control"  value="{{ $cliente->ci_nit }}" disabled>
        </div>
        <div class="col-md-4">
            <label for="">EMPRESA</label>
            <input type="text"  name="empresa" class="form-control"  value="{{ $cliente->empresa }}" disabled>
        </div>
        <div class="col-md-4">
            <label for="">TELEFONO</label>
            <input type="text"  name="telefono" class="form-control"  value="{{ $cliente->telefono }}" disabled>
        </div>
    </div>


@endsection