@extends('layouts.app')

@section('titulo', 'Dashboard')

@section('contenido')

<div class="dashboard-container">

    <h1 class="dashboard-title">Bienvenido, Admin</h1>
    <p class="dashboard-subtitle">
        Aquí tienes un resumen del estado actual de las máquinas dispensadoras.
    </p>

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
            <p class="section-empty">
                No hay productos con stock crítico
            </p>
        @endif
    </div>
</div>
@endsection