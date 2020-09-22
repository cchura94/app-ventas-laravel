@extends('layouts.admin')

@section('contenedor')
<h1>Editar Cliente</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('cliente.update', $cliente->id) }}" method="post">
    @csrf
    @Method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label for="">Nombres</label>
            <input type="text" required name="nombres" class="form-control" value="{{ $cliente->nombres }}">
    
        </div>
        <div class="col-md-6">
            <label for="">Apellidos</label>
            <input type="text" required name="apellidos" class="form-control"  value="{{ $cliente->apellidos }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="">CI / NIT</label>
            <input type="text"  name="ci_nit" class="form-control"  value="{{ $cliente->ci_nit }}">
        </div>
        <div class="col-md-4">
            <label for="">EMPRESA</label>
            <input type="text"  name="empresa" class="form-control"  value="{{ $cliente->empresa }}">
        </div>
        <div class="col-md-4">
            <label for="">TELEFONO</label>
            <input type="text"  name="telefono" class="form-control"  value="{{ $cliente->telefono }}">
        </div>
    </div>

    <input type="submit" class="btn btn-info">
    
    
</form>

@endsection