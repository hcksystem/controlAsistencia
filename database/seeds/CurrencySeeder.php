<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            ['id' => 1, 'name' => 'Dolar', 'code' => 'USD', 'symbol' => '$', 'active' => '1', 'value' => 1 ],
            ['id' => 2, 'name' => 'Euro', 'code' => 'UE', 'symbol' => '€', 'active' => '1', 'value' => 1.12 ],
            ['id' => 3, 'name' => 'Pesos Chilenos', 'code' => 'CLP', 'symbol' => '$', 'active' => '1', 'value' => 0.0014 ]
        ]);
    }
}
