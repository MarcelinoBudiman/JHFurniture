<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction')->insert([
            'user_id' => 3,
            'transaction_date' => date("Y-m-d"),
            'method' => 'Credit',
            'card_number' => 1234567890123456
        ]);
    }
}
