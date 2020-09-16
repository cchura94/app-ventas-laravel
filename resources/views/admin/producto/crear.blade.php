@extends('layouts.admin')

@section('contenedor')
<h1>Nuevo Producto</h1>

<form action="/producto" method="post">
    @csrf
    <label for="">Nombre Producto:</label>
    <input type="text" name="nombre">
    <br>
    <label for="">Cantidad:</label>
    <input type="number" name="cantidad">
    <br>
    <label for="">Precio Producto:</label>
    <input type="text" name="precio">
    <br>
    <label for="">Imagen Producto:</label>
    <input type="file" name="imagen">
    <br>
    <label for="">Ingrese Detalle de Producto</label>
    <textarea name="detalle"></textarea> 
    <br>
    <input type="submit">
</form>

@endsection