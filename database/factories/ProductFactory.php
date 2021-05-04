<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product' => $this->faker->word(20),
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->randomFloat('2', '20.00', '200.00'),
            'img' => $this->faker->image(storage_path().'\app\public\products',1000,600, null, false),
            'slug' => $this->faker->slug('20')
        ];
    }
}
