@extends('layouts.admin')

@section('contenedor')
<h1>Nuevo Cliente</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('cliente.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="">Nombres</label>
            <input type="text" required name="nombres" class="form-control">
    
        </div>
        <div class="col-md-6">
            <label for="">Apellidos</label>
            <input type="text" required name="apellidos" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label for="">CI / NIT</label>
            <input type="text"  name="ci_nit" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">EMPRESA</label>
            <input type="text"  name="empresa" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="">TELEFONO</label>
            <input type="text"  name="telefono" class="form-control">
        </div>
    </div>

    <input type="submit" class="btn btn-info">
    
    
</form>

@endsection