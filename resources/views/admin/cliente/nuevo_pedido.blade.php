@extends('layouts.admin') @section('contenedor')
<h1>Nuevo Pedido</h1>
<h1>Cliente: {{ $clie->nombres }} {{ $clie->apellidos }}</h1>
<h2>Telefono: {{ $clie->telefono }}</h2>
<h2>CI / NIT: {{ $clie->ci_nit }}</h2>

<hr />

<h2>Lista de Producto (seleccionar)</h2>
<form action="{{ route('nueva_venta') }}" method="post">
    @csrf
    <input type="hidden" name="cliente_id" value="{{ $clie->id }}">
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>SELECCIONAR</th>
                    <th>CANTIDAD A VENDER</th>
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
                    <td><input type="checkbox" name="producto[]" value="{{ $prod->id }}" /></td>
                    <td><input type="number" name="catidad_vender" /></td>
                    <td>{{ $prod->nombre }}</td>
                    <td>{{ $prod->precio }}</td>
                    <td>
                        <img
                            src="{{ asset('imagenes/'.$prod->imagen) }}"
                            width="80px"
                            alt=""
                        />
                    </td>
                    <td>{{ $prod->cantidad }}</td>
                    <td>{{ $prod->precio * $prod->cantidad }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button
                            type="button"
                            class="btn btn-primary btn-xs"
                            data-toggle="modal"
                            data-target="#Modal{{$prod->id}}"
                        >
                            ver2
                        </button>

                        <!-- Modal -->
                        <div
                            class="modal fade"
                            id="Modal{{$prod->id}}"
                            tabindex="-1"
                            aria-labelledby="exampleModalLabel"
                            aria-hidden="true"
                        >
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5
                                            class="modal-title"
                                            id="exampleModalLabel"
                                        >
                                            Datos Producto
                                        </h5>
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true"
                                                >&times;</span
                                            >
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>{{ $prod->id }}</h4>
                                        <h4>{{ $prod->nombre }}</h4>
                                        <h4>{{ $prod->precio }}</h4>
                                        <img
                                            src="{{ asset('imagenes/'.$prod->imagen) }}"
                                            width="180px"
                                            alt=""
                                        />
                                        <h4>{{ $prod->cantidad }}</h4>
                                        <h4>
                                            {{ $prod->precio * $prod->cantidad }}
                                        </h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                        <button
                                            type="button"
                                            class="btn btn-primary"
                                        >
                                            Save changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" name="Vender" class="btn btn-success">
        </form>
    </div>
</div>

@endsection
