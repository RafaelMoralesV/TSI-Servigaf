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
            'name' => $this->faker->firstName(),
            'price' => $this->faker->numberBetween(1, 50) * 1000,
            'category' => $this->faker->randomElement(['Mueble', 'Repuesto', 'Gasfiteria', 'Otros']),
            'img_path' => $this->faker->image(),
            'description' => $this->faker->realText(),
        ];
    }
}
