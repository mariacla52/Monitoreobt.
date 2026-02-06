<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineProduct;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\StockAlertNotification;

class MachineProductController extends Controller
{
    public function index()
    {
        $items = MachineProduct::with(['machine', 'product'])
            ->orderByRaw("
                CASE
                    WHEN cantidad_actual <= 8 THEN 1
                    WHEN cantidad_actual BETWEEN 9 AND 16 THEN 2
                    ELSE 3
                END
            ")
            ->orderBy('cantidad_actual', 'asc')
            ->get();

        return view('machine_products.index', compact('items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cantidad_actual' => 'required|integer|min:0|max:32',
        ]);

        $item = MachineProduct::findOrFail($id);
        $item->cantidad_actual = $request->cantidad_actual;
        $item->updated_by = Auth::id();
        $item->save();

        $nivel = null;
        $mensaje = null;
        
        // Requieren Mantenimiento
           if ($item->machine->estado_stock === 'machinesmantenimiento') {
            $nivel = 'mantenimiento';
            $mensaje = "⚙ La máquina {$item->machine->numero_maquina} ubicada en {$item->machine->ubicacion}
            requiere MANTENIMIENTO.";
            }
            
            // Stock Critico
               elseif ($item->cantidad_actual <= 8) {
                $nivel = 'critico';
                $mensaje = "🛑 STOCK CRÍTICO:{$item->product->nombre} en la máquina {$item->machine->numero_maquina}
                ({$item->machine->ubicacion}).";
                }
                
                // Stock Bajo
                   elseif ($item->cantidad_actual >= 9 && $item->cantidad_actual <= 16) {
                    $nivel = 'bajo';
                    $mensaje = "⚠️ STOCK BAJO:{$item->product->nombre} en la máquina {$item->machine->numero_maquina}
                    ({$item->machine->ubicacion}).";
                    }
                    
                    // Enviar notificaciones
                       if ($mensaje) {
                        $usuarios = User::whereIn('tipo_usuario', ['administrador','proveedor'])->get();
                        
                        foreach ($usuarios as $usuario) {
                            $usuario->notify(
                                new StockAlertNotification($mensaje, $nivel)
                                );
                            }
                        }
                        
                        return redirect()
                        ->route('machine-products.index')
                        ->with('success', 'Cantidad actualizada correctamente');
                    }
                }