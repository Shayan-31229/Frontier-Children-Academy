<?php

use Illuminate\Database\Seeder;

class TransactionLedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Cash A/C',13],
            ['Bank A/C',78],
            ['Expense A/C',70],
            ['Fees', 77]
        ];

        foreach($data as $obj){
            DB::table('transaction_heads')->insert([
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'created_by' => 1,
                'tr_head' => $obj[0],
                'acc_id' => $obj[1],
                'status' => 1
            ]);
        }
    }
}
