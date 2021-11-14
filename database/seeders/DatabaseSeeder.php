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
        User::create([
            'name' => "Base admin",
            'email' => "email@mailinator.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Product::factory(10)->create();

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
