<?php

use Illuminate\Database\Seeder;

class MvConcept extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mv_concepts')->insert([
            ['concept' => 'TradeOperation'],
            ['concept' => 'BankCharges'],
            ['concept' => 'Trips'],
            ['concept' => 'Office supplies'],
            ['concept' => 'Office rent and expenses'],
            ['concept' => 'Wages'],
            ['concept' => 'Petty Expenses'],
            ['concept' => 'Administrative services'],
            ['concept' => 'Miscellaneous'],
            ['concept' => 'Initial position'],
            ['concept' => 'Current Account/CC'],
            ['concept' => 'Other Expenses'],
        ]);
    }
}
