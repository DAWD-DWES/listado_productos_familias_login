@extends('app')
@section('titulo', "Familias")
@section('encabezado', "Listado de Familias")

@section('contenido')
<table class="table table-striped table-dark">
    <thead>
        <tr class="text-center">
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($familias as $familia)
        <tr class="text-center">
            <td>{{$familia->getCod()}}</td>
            <td>{{$familia->getNombre()}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="container mt-5 text-center">
    <a href="index.php" class="btn btn-info text-white">Volver</a>
</div>
@endsection