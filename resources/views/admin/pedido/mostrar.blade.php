@extends('layouts.admin')

@section('contenedor')
<h1>Datos de Cliente:</h1> {{ $pedido->cliente->nombres }} {{ $pedido->cliente->apellidos }}
<h1>CI / NIT:</h1> {{ $pedido->cliente->ci_nit }}
<hr>
<h1>Lista de Compras:</h1>
 <table class="table">

 
 @foreach($pedido->productos as $prod )
 <tr>
    <td>{{ $prod->nombre }}</td>
    <td>{{ $prod->precio }}</td>
    <td></td>
 
 </tr>
 @endforeach

 
 </table>

 @endsection