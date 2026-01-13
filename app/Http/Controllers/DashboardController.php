<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMachines = DB::table('machines')->count();
        // Stock crítico (cantidadactual <= 8) 
        $stockCritico = DB::table('machine_products') ->where('cantidad_actual', '<=', 8) ->count();
        // Stock bajo (entre 9 y 16)
        $stockBajo = DB::table('machine_products') ->whereBetween('cantidad_actual', [9, 16]) ->count();
        // Mantenimiento (por ahora en 0)
        $machinesMantenimiento = 0;
        // Bloque siguiente
        $maquinasStockCritico = DB::table('machine_products')
        ->join('machines', 'machine_products.machine_id', '=', 'machines.id')
        ->join('products', 'machine_products.product_id', '=', 'products.id')
        ->where('machine_products.cantidad_actual', '<=', 8)
        ->select(
            'machines.id as maquina',
            'machines.ubicacion as ubicacion',
            'products.nombre as producto',
            'machine_products.cantidad_actual',
            'machine_products.cantidad_maxima'
            )
            ->get();
            
            return view('dashboard', compact(
            'totalMachines',
            'stockCritico',
            'stockBajo',
            'machinesMantenimiento',
            'maquinasStockCritico'
        ));
    }
}
