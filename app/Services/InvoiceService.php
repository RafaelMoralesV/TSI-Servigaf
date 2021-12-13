<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice;

class InvoiceService
{
    public function create(Client $client, Transaction $transaction)
    {
        $servigaf = new Party([
            'name' => 'NUÑEZ BIRKNER GIOVANNA GISEL Y OTRO',
            'phone' => '(+562) 2234 5678',
            'address' => 'SAN FRANCISCO 2252, SANTIAGO, SANTIAGO',
            'custom_fields' => [
                'RUT' => '53.303.867-0',
                'Giro' => 'VENTA ARTS JUGUE REP ENSERES GASFIT.FERR X MENOR',
                'Ref. Vendedor' => '10325417-5',
            ]
        ]);

        $customer = new Buyer([
            'name' => $client->name,
            'custom_fields' => [
                'phone' => $client->phone,
                'email' => $client->email,
                'adress' => $client->address,
                'buy order' => $transaction->buy_order,
            ],
        ]);

        $invoice = Invoice::make('Boleta')
            ->seller($servigaf)
            ->buyer($customer)
            ->sequence($transaction->buy_order)
            ->shipping(3000)
            ->logo(public_path('logo.png'))
            ->currencySymbol('$')
            ->currencyCode('CLP')
            ->currencyFormat('{SYMBOL}{VALUE}');

        foreach ($transaction->products as $product) {
            $item = (new InvoiceItem())
                ->title($product->name)
                ->pricePerUnit($product->price)
                ->quantity($product->pivot->amount);

            $invoice->addItem($item);
        }

        return $invoice->stream();
    }
}
