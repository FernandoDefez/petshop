<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        \App\Models\Admin::factory(1)->create();

        Storage::deleteDirectory('pets');
        Storage::makeDirectory('pets');

        \App\Models\Pet::factory(2)
            ->has(
                \App\Models\Category::factory()->count(2)
                    ->has(
                        \App\Models\Product::factory()->count(2)
                    )
            )->create();
    }
}
