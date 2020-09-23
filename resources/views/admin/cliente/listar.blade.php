@extends('layouts.admin')

@section('contenedor')
<h1>Lista de Clientes</h1>

<a href="/cliente/create" class="btn btn-primary">Nuevo Cliente</a>
<a href="{{ route('cliente.create') }}" class="btn btn-primary">Nuevo Cliente</a>

<!-- {{ $clientes }} -->
@if(session('ok'))
    <div class="alert alert-success">
        <p>{{ session('ok') }}</p>
    </div>
@endif
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
              <a href="{{ route('addpedido', $clie->id) }}" class="btn btn-outline-info">Realizar Nuevo Pedido</a>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Modal{{$clie->id}}">
  ver2
</button>

<!-- Modal -->
<div class="modal fade" id="Modal{{$clie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>{{ $clie->id }}</h4>
        <h4>{{ $clie->nombres }}</h4>
        <h4>{{ $clie->apellidos }}</h4>
        <h4>{{ $clie->ci_nit }}</h4>
        <h4>{{ $clie->empresa }}</h4>
        <h4>{{ $clie->telefono }}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



                <a href="{{ route('cliente.show', $clie->id) }}" class="btn btn-success btn-xs">ver</a>
                <a href="{{ route('cliente.edit', $clie->id) }}" class="btn btn-warning btn-xs">editar</a>
                

                            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ModalEliminar{{$clie->id}}">
  eliminar
</button>

<!-- Modal -->
<div class="modal fade" id="ModalEliminar{{$clie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ¿Esta seguro de eliinar al cliente: {{ $clie->nombres }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <form action="{{ route('cliente.destroy', $clie->id) }}" method="post">
            @csrf
            @Method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $clientes->links() }}
<br>
{{ $clientes->total() }}


@endsection