@extends('app')
@section('titulo', "Productos")
@section('encabezado', "Listado de Productos")
@section('contenido')
<table class="table table-striped table-dark">
    <thead>
        <tr class="text-center">
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nombre Corto</th>
            <th scope="col">Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr class="text-center">
            <td>{{ $producto->getId() }}</td>
            <td>{{ $producto->getNombre() }}</td>
            <td>{{ $producto->getNombreCorto() }}</td>
            <td class="{{ $producto->getPvp() > 100 ? 'text-danger fw-semibold' : 'text-success fw-semibold' }}">
                {{ $producto->getPvp() }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container mt-5 text-center">
    <a href="index.php" class="btn btn-info text-white">Volver</a>
</div>
@endsection