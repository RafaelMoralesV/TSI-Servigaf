<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $transactions = Transaction::with('products', 'client')->paginate(10);

        return view('admin.transactions.index', compact('transactions'));
    }


    /**
     * Display the specified resource.
     *
     * @param Transaction $transaction
     * @return View
     */
    public function show(Transaction $transaction): View
    {
        return view('admin.transactions.show', compact('transaction'));
    }

}
