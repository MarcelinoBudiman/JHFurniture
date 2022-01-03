<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\SoftDeletes;


class TransactionController extends Controller
{
    public function transactionHistory($id){
        $transaction = Transaction::where('user_id', '=', $id)->get();
        $transactions = Transaction::get();


        //dd($transaction[1]->details[0]->furnitures);
        return view('transaction_detail', compact('transaction', 'transactions'));
    }
}
