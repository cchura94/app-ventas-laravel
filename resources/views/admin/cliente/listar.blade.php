@extends('layouts.admin')

@section('contenedor')
<h1>Lista de Clientes</h1>

<a href="/cliente/create" class="btn btn-primary">Nuevo Cliente</a>
<a href="{{ route('cliente.create') }}" class="btn btn-primary">Nuevo Cliente</a>

<!-- {{ $clientes }} -->
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>CI / NIT</th>
            <th>EMPRESA</th>
            <th>TELEFONO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $clie)
        <tr>
            <td>{{ $clie->id }}</td>
            <td>{{ $clie->nombres }}</td>
            <td>{{ $clie->apellidos }}</td>
            <td>{{ $clie->ci_nit }}</td>
            <td>{{ $clie->empresa }}</td>
            <td>{{ $clie->telefono }}</td>
            <td>
                <a href="" class="btn btn-success btn-xs">ver</a>
                <a href="" class="btn btn-warning btn-xs">editar</a>
                <button class="btn btn-danger btn-xs" >eliminar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection