<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //Mostrar todas las maquinas
        return response()->json(Machine::all(), 200);  // Mostrar todos los productos
    }

    /**
     * Crear una nueva máquina
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'numero_maquina' => ['required', 'integer', 'min:1'],
            'ubicacion' => ['required', 'string', 'max:255'],
            'estado_stock' => ['required', 'string', 'max:50'],
        ]);
        //Guardar datos en la DB
        $machine = Machine::create($datos);

        //Responder al usuario 
        return response()->json([
            'success' => true,
            'message' => 'Máquina creada exitosamente',
            'data' => $machine
        ], 201);
    }


    /**
    * Mostrar una máquina por ID
    */
    public function show($id)
    {
        $machine = Machine::find($id);

        if (!$machine) {
            return response()->json([
                'success' => false,
                'message' => 'Máquina no encontrada'
            ], 404);
        }

        return response()->json($machine, 200);
    }

    /**
     * Actualizar una máquina
     */
    public function update(Request $request, $id)
    {
        $machine = Machine::find($id);

        if (!$machine) {
            return response()->json([
                'success' => false,
                'message' => 'Máquina no encontrada'
            ], 404);
        }

        $datos = $request->validate([
            'numero_maquina' => ['required', 'integer', 'min:1'],
            'ubicacion' => ['required', 'string', 'max:255'],
            'estado_stock' => ['required', 'string', 'max:50'],
        ]);

        $machine->update($datos);

        return response()->json([
            'success' => true,
            'message' => 'Máquina actualizada exitosamente',
            'data' => $machine
        ], 200);
    }

    /**
     * Eliminar una máquina
     */
    public function destroy($id)
    {
        $machine = Machine::find($id);

        if (!$machine) {
            return response()->json([
                'success' => false,
                'message' => 'Máquina no encontrada'
            ], 404);
        }

        $machine->delete();

        return response()->json([
            'success' => true,
            'message' => 'Máquina eliminada exitosamente'
        ], 200);
    }
}