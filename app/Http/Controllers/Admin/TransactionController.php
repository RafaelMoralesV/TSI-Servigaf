<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $transactions = Transaction::with('products', 'client')
            ->orderByDesc('updated_at')
            ->paginate(10);

        return view('admin.transactions.index', compact('transactions'));
    }


    /**
     * Display the specified resource.
     *
     * @param Transaction $transaction
     * @return RedirectResponse
     */
    public function show(Transaction $transaction): RedirectResponse
    {
        return redirect()->route('boleta', $transaction->buy_order);
    }

}
