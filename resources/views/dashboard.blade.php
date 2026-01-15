{{--@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('contenido')

<div class="dashboard-container">

    <h1 class="dashboard-title">Bienvenido, Admin</h1>
    <p class="dashboard-subtitle">Aquí tienes un resumen del estado actual de las máquinas dispensadoras.</p>
    
    <div class="dashboard-cards">

        <div class="dashboard-card">
            <h3>Máquinas Activas</h3>
            <p class="dashboard-number">{{ $totalMachines }}</p>
        </div>

        <div class="dashboard-card warning">
            <h3>Stock crítico</h3>
            <p class="dashboard-number">{{ $stockCritico }}</p>
        </div>

        <div class="dashboard-card alert">
            <h3>Stock bajo</h3>
            <p class="dashboard-number">{{ $stockBajo }}</p>
        </div>

        <div class="dashboard-card maintenance">
            <h3>Requieren mantenimiento</h3>
            <p class="dashboard-number">{{ $machinesMantenimiento }}</p>
        </div>

    </div>
    
    <!-- SECCIÓN INFERIOR -->
    <div class="dashboard-section">
        <div class="section-header">
            <h2 class="section-title">❗ Máquinas con Stock Crítico</h2>
            <a href="{{ route('machines.index') }}" class="btn-update">🔄 Actualizar</a>
        </div>

        @if(isset($maquinasStockCritico) && $maquinasStockCritico->count() > 0)

            <table class="stock-table">
                <tbody>
                    @foreach($maquinasStockCritico as $item)
                        <tr>
                            <td class="machine-col">
                                #{{ $item->maquina }}
                            </td>
                            <td class="location-col">
                                {{ $item->ubicacion }}
                            </td>
                            <td class="product-col">
                                {{ $item->producto }}
                            </td>
                            <td class="qty-col">
                                {{ str_pad($item->cantidad_actual, 2, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="status-col">
                                <span class="status-badge">
                                    ❗ Stock Crítico
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @else
            <p class="section-empty">No hay productos con stock crítico</p>
        @endif
    </div>
</div>
@endsection--}}

@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('contenido')

<div class="dashboard-container">
    
    <h1 class="dashboard-title text-2xl font-bold text-gray-800">Bienvenido, Admin</h1>
    <p class="dashboard-subtitle text-gray-600">Aquí tienes un resumen del estado actual de las máquinas dispensadoras.</p>
    <div class="dashboard-cards">
        <div class="dashboard-card bg-blue-100 border-l-4 border-blue-500 rounded-xl shadow-md hover:scale-105 transition">
            <h3 class="text-sm font-semibold text-gray-700 uppercase">Máquinas Activas</h3>
            <p class="text-3xl font-bold text-blue-700">
                {{ $totalMachines }}
            </p>
        </div>
        <div class="dashboard-card bg-red-100 border-l-4 border-red-500 rounded-xl shadow-md hover:scale-105 transition">
            <h3 class="text-sm font-semibold text-red-700 uppercase">Stock crítico</h3>
            <p class="text-3xl font-bold text-red-700">
                {{ $stockCritico }}
            </p>
        </div>

        <div class="dashboard-card bg-yellow-100 border-l-4 border-yellow-500 rounded-xl shadow-md hover:scale-105 transition">
            <h3 class="text-sm font-semibold text-yellow-700 uppercase">Stock bajo</h3>
            <p class="text-3xl font-bold text-yellow-700">
                {{ $stockBajo }}
            </p>
        </div>

        <div class="dashboard-card bg-purple-300 border-l-4 border-indigo-500 rounded-xl shadow-md hover:scale-105 transition">
            <h3 class="text-sm font-semibold text-indigo-700 uppercase">Requieren mantenimiento</h3>
            <p class="text-3xl font-bold text-indigo-700">
                {{ $machinesMantenimiento }}
            </p>
        </div>
    </div>

    <!-- SECCIÓN INFERIOR -->
     <div class="dashboard-section mt-10 bg-red-50 border border-red-100 rounded-xl p-6 shadow">
        <div class="section-header flex justify-between items-center mb-6 bg-red-500 text-white p-4 rounded-lg">
            <h2 class="section-title text-lg font-semibold flex items-center gap-2">❗ Máquinas con Stock Crítico</h2>
            
            <a href="{{ route('machines.index') }}"
            class="bg-white text-red-600 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-100 transition">🔄 Actualizar</a>
        </div>
        
        @if(isset($maquinasStockCritico) && $maquinasStockCritico->count() > 0)

            <table class="stock-table w-full">
                <tbody>
                    @foreach($maquinasStockCritico as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="machine-col font-semibold text-gray-700">
                                #{{ $item->maquina }}
                            </td>
                            <td class="location-col text-gray-600 text-sm">
                                {{ $item->ubicacion }}
                            </td>
                            <td class="product-col">
                                {{ $item->producto }}
                            </td>
                            <td class="qty-col text-center font-bold">
                                {{ str_pad($item->cantidad_actual, 2, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="status-col text-right">
                                <span class="status-badge bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-semibold">
                                    ❗ Stock Crítico
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            @else
            <p class="section-empty text-green-600 font-medium">No hay productos con stock crítico </p>
            @endif
        </div>
    </div>
@endsection



