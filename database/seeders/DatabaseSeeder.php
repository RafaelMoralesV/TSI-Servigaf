<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        User::factory(10)->create();
        User::factory(1)->create([
            'name' => "Base admin",
            'email' => "email@mailinator.com",
        ]);

        Product::factory(50)->create();

        Client::factory(10)->create()->each(function ($client){
            Transaction::factory(1)->create([
                'client_id' => $client->id,
            ])->each(function ($transaction){
                Order::factory(3)->create([
                    'transaction_id' => $transaction->id,
                ]);
            });
        });

    }
}
