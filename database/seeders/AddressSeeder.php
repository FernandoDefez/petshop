<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('addresses')->insert([
            'city' => 'Isla Mujeres',
            'suburb' => 'Salina Grande',
            'add1' => 'Unidad 23 de Noviembre',
            'add2' => 'Edificio 41 Departamento 12',
            'zip' => '77400',
            'phone_number' => '9984181120',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
