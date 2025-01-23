@extends('app')
@section('titulo', "Login")
@section('cabecera')
@endsection
@section('encabezado', "Login")
@section('contenido')
@php
$credenciales_error = "Error de Credenciales";
$nombre_error = "Introduce el usuario";
$pwd_error = "Introduce el password";
@endphp
<div class="d-flex justify-content-center h-100">
    <div class="card">
        <div class="card-header">
            <h3>Login</h3>
        </div>
        <div class="card-body">
            <form name='login' method='POST' action='{{ $_SERVER['PHP_SELF'] }}'>
                <div class="input-group me-3 mb-3">
                    <span class="input-group-text"><i class="bi-person-fill"></i></span>
                    <input type="text" class= "form-control {{ (($nombreErr ?? false) ? "is-invalid" : "") }} me-2" 
                           placeholder="usuario" name='usuario' >
                    <div class="invalid-feedback">
                        <p>{{ $nombre_error }}</p>
                    </div>
                </div>
                <div class="input-group me-3 mb-3">
                    <span class="input-group-text"><i class="bi-key"></i></span>
                    <input type="password" class=" form-control {{ (($pwdErr ?? false) ? "is-invalid" : "") }} me-2" 
                           placeholder="contraseña" name='pass' >
                    <div class="invalid-feedback">
                        <p>{{ $pwd_error }}</p>
                    </div>
                </div>
                @if ($errorCredenciales ?? false)
                <div class="alert alert-danger" role="alert">
                    {{ $credenciales_error }}
                </div>
                @endif
                <input type="submit" value="Login" class="btn float-right btn-success" name='login'>
            </form>
        </div>
    </div>
</div>
@endsection
