<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_id' => Transaction::get()->random(),
            'product_id' => Product::get()->random(),
            'amount' => $this->faker->numberBetween(0, 30),
            'total_price' => $this->faker->numberBetween(15, 30) * 1000,
        ];
    }
}
