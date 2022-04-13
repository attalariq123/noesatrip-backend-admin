<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate();
        return view('menu.transactions.index', compact('transactions'));
    }
}
