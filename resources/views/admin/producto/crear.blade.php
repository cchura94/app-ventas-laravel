@extends('layouts.admin') @section('contenedor')
<h1>Nuevo Producto</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form
    action="{{ route('producto_guardar') }}"
    method="post"
    enctype="multipart/form-data"
>
    @csrf
    <label for="">Nombre Producto:</label>
    <input type="text" name="nombre" />
    <br />
    <label for="">Cantidad:</label>
    <input type="number" name="cantidad" />
    <br />
    <label for="">Precio Producto:</label>
    <input type="number" name="precio" step="0.01" />
    <br />
    <label for="">Imagen Producto:</label>
    <input type="file" name="imagen" />
    <br />
    <label for="">Ingrese Detalle de Producto</label>
    <textarea name="detalle"></textarea>
    <br />
    <input type="submit" class="btn btn-primary" />
</form>

@endsection
