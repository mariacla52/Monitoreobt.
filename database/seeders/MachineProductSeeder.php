<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachineProductSeeder extends Seeder
{
    public function run(): void
    {
        $cantidadMaxima = 32;
        $machineIds = DB::table('machines')->pluck('id');
        $productIds = DB::table('products')->pluck('id');

        foreach ($machineIds as $machineId) {
            foreach ($productIds as $productId) {
                DB::table('machine_products')->insert([
                    'machine_id' => $machineId,
                    'product_id' => $productId,
                    'cantidad_maxima' => $cantidadMaxima,
                    'cantidad_actual' => rand(0, $cantidadMaxima),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}