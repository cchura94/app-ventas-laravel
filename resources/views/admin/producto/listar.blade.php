@extends('layouts.admin')

@section('contenedor')
<h1>Lista de Productos</h1>

<a href="{{ route('producto_crear') }}" class="btn btn-primary">Nuevo Producto</a>

<!-- {{ $productos }} -->
@if(session('ok'))
    <div class="alert alert-success">
        <p>{{ session('ok') }}</p>
    </div>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>IMAGEN</th>
            <th>CANTIDAD</th>
            <th>SUB TOTAL</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $prod)
        <tr>
            <td>{{ $prod->id }}</td>
            <td>{{ $prod->nombre }}</td>
            <td>{{ $prod->precio }}</td>
            <td> <img src="{{ asset('imagenes/'.$prod->imagen) }}" width="80px" alt=""></td>
            <td>{{ $prod->cantidad }}</td>
            <td>{{ $prod->precio * $prod->cantidad }}</td>
            <td>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#Modal{{$prod->id}}">
  ver2
</button>

<!-- Modal -->
<div class="modal fade" id="Modal{{$prod->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4>{{ $prod->id }}</h4>
            <h4>{{ $prod->nombre }}</h4>
            <h4>{{ $prod->precio }}</h4>
            <img src="{{ asset('imagenes/'.$prod->imagen) }}" width="180px" alt="">
            <h4>{{ $prod->cantidad }}</h4>
            <h4>{{ $prod->precio * $prod->cantidad }}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



                <a href="{{ route('producto_editar', $prod->id) }}" class="btn btn-warning btn-xs">editar</a>
                

                            <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ModalEliminar{{$prod->id}}">
  eliminar
</button>

<!-- Modal -->
<div class="modal fade" id="ModalEliminar{{$prod->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Elimnar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ¿Esta seguro de eliminar al Producto: {{ $prod->nombres }}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <form action="{{ route('producto_eliminar', $prod->id) }}" method="post">
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

{{ $productos->links() }}
<br>
{{ $productos->total() }}


@endsection