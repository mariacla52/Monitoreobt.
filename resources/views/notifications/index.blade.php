@extends('layouts.app')

@section('contenido')
<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-xl font-semibold mb-4">Notificaciones</h2>

    @forelse(auth()->user()->notifications as $notification)
        <div
            class="bg-white border rounded p-4 mb-3 shadow
                   {{ $notification->read_at ? 'opacity-60' : '' }}"
        >
            <p class="text-sm text-gray-700">
                {{ $notification->data['mensaje'] ?? 'Notificación' }}
            </p>

            <div class="mt-3 flex items-center gap-4">
                <!-- Ir a maquinas -->
                <a
                    href="{{ route('machine-products.index') }}"
                    class="text-blue-600 text-sm font-medium"
                >
                    Ir a máquinas
                </a>

                <!-- Marcar como leida -->
                @if(is_null($notification->read_at))
                    <form
                        action="{{ route('notifications.read', $notification->id) }}"
                        method="POST"
                    >
                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            class="text-sm text-gray-500 hover:text-gray-700"
                        >
                            Marcar como leída
                        </button>
                    </form>
                @else
                    <span class="text-xs text-green-600">
                        ✔ Leída
                    </span>
                @endif
            </div>
        </div>
    @empty
        <p class="text-gray-500">No tienes notificaciones.</p>
    @endforelse
</div>
@endsection