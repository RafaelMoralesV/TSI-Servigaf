<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::get()->random(),
            'was_payed' => false,
            'was_received' => false,
            'extra' => $this->faker->text,
            'final_price' => $this->faker->numberBetween(50, 100) * 1000,
            'buy_order' => $this->faker->dateTime()->format("Ymdhis"),
        ];
    }
}
