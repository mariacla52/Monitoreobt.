@extends('layouts.app')

@section('titulo', 'Listado de Máquinas')

@section('contenido')
<div class="machines-container">
    <h1>Listado de Máquinas Dispensadoras</h1>

    <table class="machines-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Ubicación</th>
                <th>Estado de Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
                <tr>
                    <td>{{ $machine->id }}</td>
                    <td>{{ $machine->numero_maquina }}</td>
                    <td>{{ $machine->ubicacion }}</td>
                    <td>{{ $machine->estado_stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
