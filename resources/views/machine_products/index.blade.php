@extends('layouts.app')

@section('contenido')

<div class="max-w-7xl mx-auto px-4">
    <h3 class="text-xl font-semibold mb-6">Listado de Máquinas – Control de Stock</h3>
    
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-blue-100 text-blue-900">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold">ID Máquina</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Ubicación</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Producto</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Presentación</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Precio</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Cantidad</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Estado</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Usuario</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Tipo</th>
                     <th class="px-4 py-3 text-left text-sm font-semibold">Opciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($items as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-sm">{{ $item->machine->numero_maquina }}</td>
                        <td class="px-4 py-3 text-sm">{{ $item->machine->ubicacion }}</td>
                        <td class="px-4 py-3 text-sm font-medium">{{ $item->product->nombre }}</td>
                        <td class="px-4 py-3 text-sm">{{ $item->product->presentacion }}</td>
                        <td class="px-4 py-3 text-sm">
                            ${{ number_format($item->product->precio, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm font-semibold">
                            {{ $item->cantidad_actual }}</td>
                            <td class="px-4 py-3 text-sm">
                            @if ($item->machine->estado_stock === 'mantenimiento')
    <span class="px-2 py-1 text-xs font-semibold rounded bg-gray-100 text-gray-800">
        Mantenimiento
    </span>
@elseif ($item->cantidad_actual <= 8)
    <span class="px-2 py-1 text-xs font-semibold rounded bg-red-100 text-red-700">
        Crítico
    </span>
@elseif ($item->cantidad_actual <= 16)
    <span class="px-2 py-1 text-xs font-semibold rounded bg-yellow-100 text-yellow-700">
        Bajo
    </span>
@else
    <span class="px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-700">
        Normal
    </span>
@endif

                        </td>

                        <td class="px-4 py-3 text-sm">
                            {{ $item->updatedByUser?->name ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ $item->updatedByUser?->tipo_usuario ?? '-' }}
                        </td>


                        <td class="px-4 py-3 text-sm">
                            <!-- Mensajito flotante simple -->
                            <details class="group">
                                <summary class="cursor-pointer bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm inline-block">
                                    🔄 Actualizar
                                </summary>

                                <div class="mt-2 bg-white border border-gray-300 rounded-lg p-3 shadow text-sm">
                                    <p class="mb-2 text-gray-700 font-medium">
                                        Nueva cantidad (máx. 32)
                                    </p>

                                    <form
                                        action="{{ route('machine-products.update', $item->id) }}"
                                        method="POST"
                                        class="flex items-center gap-2"
                                    >
                                        @csrf
                                        @method('PUT')

                                        <input
                                            type="number"
                                            name="cantidad_actual"
                                            min="0"
                                            max="32"
                                            value="{{ $item->cantidad_actual }}"
                                            class="w-20 border border-gray-300 rounded px-2 py-1 text-center"
                                            required
                                        >

                                        <button
                                            type="submit"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded"
                                        >
                                            Guardar
                                        </button>
                                    </form>
                                </div>
                            </details>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection