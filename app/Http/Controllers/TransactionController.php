<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function transactionHistory($id){
        $transaction = DB::table('transaction')->where('user_id', '=', $id)->get();
        $transactions = Transaction::all();
        return view('transaction_detail', compact('transaction', 'transactions'));
    }
}
