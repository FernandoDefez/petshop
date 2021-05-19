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
         * alimento
         * galletas
         * juguetes
         * ropa
         * entretenimiento
         * accesorios
         * farmacéuticos
         * camas
         * tapetes 
         * antipulgas
         * higiene
        */

        DB::table('products')->insert([
            [   
                'name' => 'Purina Pro Plan Razas Pequeñas',
                'description' => '
                    Purina te trae alimentos de alta calidad para tus cachorros 
                    / Purina Pro Plan Exigent Special Care 
                    / Contenido Neto 23 kg',
                'price' => 6.99,
                'img' => 'product1.png',
                'slug' => 'purina-pro-plan-razas-pequeñas',
                'availability' => 15,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Royal Canin Medium',
                'description' => '
                    Royal Canin te trae alimentos de premium para tus mascotas
                    / Adulto
                    / Natural Defenses
                    / Contenido Neto 28 kg',
                'price' => 5.99,
                'img' => 'product2.png',
                'slug' => 'royal-canin-medium',
                'availability' => 27,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Royal Canin Puppy',
                'description' => '
                    Royal Canin te trae alimentos de premium para tus mascotas
                    / Cachorros
                    / Natural Defenses
                    / Contenido Neto 24 kg',
                'price' => 3.99,
                'img' => 'product3.png',
                'slug' => 'royal-canin-puppy',
                'availability' => 18,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Pedigree Etapa 1 Cachorros',
                'description' => '
                    Pedigree Etapa 1 para tu cachorro para un sano crecimiento
                    / Cachorros
                    / Vital Protection
                    / Contenido Neto 21 kg',
                'price' => 3.40,
                'img' => 'product4.png',
                'slug' => 'pedigree-etapa-1-cachorros',
                'availability' => 14,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Purina Dog Chow Cachorros',
                'description' => '
                    Purina Dog Chow para el cachorro de la casa
                    / Cachorros
                    / Corazón Sano
                    / Contenido Neto 17 kg',
                'price' => 3.80,
                'img' => 'product6.png',
                'slug' => 'purina-dog-chow-cachorros',
                'availability' => 11,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Boomerang Color Naranja',
                'description' => '
                    Diverte a tu perro con un jugete clásico pero muy divertido
                    / Para perro
                    / Material de algodón',
                'price' => 1.50,
                'img' => 'product21.png',
                'slug' => 'boomerang-de-algodón-color-rosado',
                'availability' => 11,
                'category_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Camisita Guinda',
                'description' => '
                    Camisita tipo polo
                    / Para cachorros
                    / Color Guinda',
                'price' => 1.80,
                'img' => 'product41.png',
                'slug' => 'camisa-polo-color-guinda',
                'availability' => 6,
                'category_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Jumper Rosada',
                'description' => '
                    Jumper para cachorros
                    / Color Rosada',
                'price' => 1.95,
                'img' => 'product42.png',
                'slug' => 'jumper-color-rosada',
                'availability' => 8,
                'category_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],


            [
                'name' => 'Transportadora con Asa',
                'description' => '
                    Transportadora
                    / Color Beige y Azul',
                'price' => 9.00,
                'img' => 'product61.png',
                'slug' => 'transportadora-con-asa-color-beige-y-azul',
                'availability' => 4,
                'category_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Transportadora',
                'description' => '
                    Transportadora
                    / Color Gris',
                'price' => 9.80,
                'img' => 'product62.png',
                'slug' => 'transportadora-color-gris',
                'availability' => 6,
                'category_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'Vetriderm Jabón Dermatológico',
                'description' => '
                    Coadyuvante en el tratamiento de infecciones de la piel
                    / Ingredientes 100% naturales
                    / Contenido neto 100g',
                'price' => 2.12,
                'img' => 'product71.png',
                'slug' => 'jabon-dermatologico-vertiderm',
                'availability' => 8,
                'category_id' => 7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'name' => 'Cloralex Mascotas',
                'description' => '
                    Eliminador de heces y orina
                    / Elimina olores
                    / Previene enfermedades
                    / Contenido neto 950 ml',
                'price' => 1.30,
                'img' => 'product102.png',
                'slug' => 'cloralex-mascotas',
                'availability' => 10,
                'category_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Recogedor para Desechos',
                'description' => '
                    Fancy Pets
                    / Ligero y practico
                    / Recomendado para razas pequeñas
                    / Contenido 1 pieza',
                'price' => 1.44,
                'img' => 'product103.png',
                'slug' => 'fancy-pets-recogedor-para-desechos',
                'availability' => 5,
                'category_id' => 11,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
