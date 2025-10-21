<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::create([
            'order_number' => 'ORD-0001',
            'customer_id' => 2,
            'book_id' => 1,
            'quantity' => 1,
            'total_amount' => 50000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-0002',
            'customer_id' => 2,
            'book_id' => 2,
            'quantity' => 1,
            'total_amount' => 60000.00
        ]);

        Transaction::create([
            'order_number' => 'ORD-0003',
            'customer_id' => 3,
            'book_id' => 3,
            'quantity' => 1,
            'total_amount' => 40000.00
        ]);
    }
}


