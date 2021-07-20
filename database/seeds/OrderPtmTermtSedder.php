<?php

use Illuminate\Database\Seeder;

class OrderPtmTermtSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_pmt_terms')->insert([
            ['payment_terms' => 'Cash in Advance', 'capital_at_risk' => 0.05, 'created_at' => now()],
            ['payment_terms' => 'Deposit + Balance TT against copies of docs', 'capital_at_risk' => 0.15, 'created_at' => now()],
            ['payment_terms' => '100% TT against copies of documents', 'capital_at_risk' => 0.35, 'created_at' => now()],
            ['payment_terms' => 'Deposit + Balance TT for Telex release', 'capital_at_risk' => 0.2, 'created_at' => now()],
            ['payment_terms' => '100% TT for telex release', 'capital_at_risk' => 0.4, 'created_at' => now()],
            ['payment_terms' => 'Deposit + Balance D/P', 'capital_at_risk' => 0.2, 'created_at' => now()],
            ['payment_terms' => 'D/P', 'capital_at_risk' => 0.3, 'created_at' => now()],
            ['payment_terms' => 'L/C', 'capital_at_risk' => 0.3, 'created_at' => now()],
            ['payment_terms' => 'On Credit', 'capital_at_risk' => 1, 'created_at' => now()],
        ]);
    }
}
