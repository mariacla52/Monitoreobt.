<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('products')->insert([
            [
                'nombre' => 'Agua Brisa Sin Gas',
                'presentacion' => '280 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Agua Brisa Con Gas',
                'presentacion' => '280 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Agua Brisa Manzana',
                'presentacion' => '600 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Agua Brisa Lima Limón',
                'presentacion' => '600 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Coca Cola',
                'presentacion' => '600 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Coca Cola Sin Azúcar',
                'presentacion' => '600 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Hit Mango',
                'presentacion' => '350 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Hit Mora',
                'presentacion' => '350 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Fuze Tea Durazno',
                'presentacion' => '400 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Fuze Tea Limón',
                'presentacion' => '400 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Sprite',
                'presentacion' => '400 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Quatro',
                'presentacion' => '400 ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
