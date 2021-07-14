<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * alimentos
         * juguetes
         * ropa
         * accesorios
         * farmacéuticos
         * higiene
         * alimento (gato)
         * accesorios (gato)
        */

        DB::table('products')->insert([
            [
                'name' => 'Comida para perros / Purina  Razas Pequeñas',
                'description' => '
                    Purina te trae alimentos de alta calidad para tus cachorros
                    / Purina Pro Plan Exigent Special Care
                    / Contenido Neto 23 kg',
                'price' => 165.99,
                'img' => '1.png',
                'slug' => 'purina-pro-plan-razas-pequeñas',
                'availability' => 40,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Boomerang',
                'description' => '
                    Boomerang color naranja / Material de Algodón
                    / Hecho en México',
                'price' => 30.99,
                'img' => '21.png',
                'slug' => 'orange-boomerang',
                'availability' => 18,
                'category_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Hoodie Rosado',
                'description' => '
                    Hoodie color rosado / Material de Algodón
                    / Hecho en México',
                'price' => 120.55,
                'img' => '31.png',
                'slug' => 'pink-hoodie',
                'availability' => 20,
                'category_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Recogedor de Heces',
                'description' => '
                    Recogedor de heces fecales / Material de plástico
                    / Color Negro / Hecho en México',
                'price' => 45.55,
                'img' => '35.png',
                'slug' => 'recogedor-de-heces-plastico-negro',
                'availability' => 10,
                'category_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Jabón Antipulgas',
                'description' => '
                    Jabón Antipulgas / Elimina pulgas, piojos y garrapatas
                    / PPT / Cont. Net 100g ',
                'price' => 105.00,
                'img' => '46.png',
                'slug' => 'jabon-antipulgas-ppt',
                'availability' => 12,
                'category_id' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Shampoo Animal Planet',
                'description' => '
                    Shampoo
                    / Animal Planet / Cont. Net 1L ',
                'price' => 68.00,
                'img' => '51.png',
                'slug' => 'shampoo-animal-planet',
                'availability' => 14,
                'category_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Comida para gatos sabor a pollo',
                'description' => '
                    Insctinct The Raw Brand / Original / Receta libre de granos
                    / Sabor a Pollo / Hecho en USA / Cont. Net 1Kg ',
                'price' => 200.00,
                'img' => '61.png',
                'slug' => 'instinct-sabor-a-pollo-the-raw-brand',
                'availability' => 17,
                'category_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Arena para gatos',
                'description' => '
                    Arena para gatos / En contenedor / by Fancy Pets
                    / Cont. Net 10Kg ',
                'price' => 320.00,
                'img' => '71.png',
                'slug' => 'arena-para-gatos-fancy-pets',
                'availability' => 13,
                'category_id' => 8,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
