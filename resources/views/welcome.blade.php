@extends('layouts.app')

@section('titulo', 'Bienvenida - Refrescos BT')

@section('contenido')
<div class="welcome-container">

    <!-- Imagen -->
    <div class="welcome-image">
        <img src="{{ asset('images/welcome.jpg') }}" alt="Máquinas dispensadoras">
    </div>

    <!-- Texto -->
    <div class="welcome-text">
        <h1>SISTEMA DE MONITOREO – REFRESCOS BT</h1>
        <p>
            Ingresa en la parte superior en <strong>Login</strong><br>
            Ingresa con tu nombre de usuario y contraseña<br>
            Y empieza el monitoreo
        </p>
    </div>
</div>
@endsection

