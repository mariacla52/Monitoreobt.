@extends('layouts.app')

@section('titulo', 'Bienvenida - Refrescos BT')

@section('contenido')

<div class="bg-blue-50 flex items-center justify-center px-6 overflow-hidden" style="height: calc(100vh - 95px);">

    <div class="max-w-4xl w-full bg-white rounded-2xl shadow-xl grid md:grid-cols-2 overflow-hidden">

        <!-- IMAGEN -->
        <div class="bg-blue-100 flex items-center justify-center p-8">
            <img src="{{ asset('images/welcome.jpg') }}" alt="Máquinas dispensadoras"class="rounded-xl shadow-md object-cover">
        </div>

        <!-- TEXTO -->
        <div class="flex flex-col justify-center p-8 text-center md:text-left">
            <h1 class="text-2xl md:text-3xl font-bold text-blue-800 mb-4">Refrescos BT<br>
                <span class="text-blue-600">Sistema de Monitoreo</span></h1>

            <p class="text-gray-600 text-sm leading-relaxed mb-6">
                Ingresa desde <strong>Login</strong>, autentícate con tu nombre de usuario,<br>
                 contraseña  y comienza el monitoreo de las máquinas dispensadoras.<br></p>

                <div class="flex justify-end pr-6">
                <a href="/login" class="bg-blue-600 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                    Log in</a></div>
            </div>
        </div>
    </div>
    @endsection


