<?php

use Illuminate\Database\Seeder;

class CargoUnitSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargo_units')->insert([
            ['name'=>'Kg'],
            ['name'=>'Lb'],  
            ['name'=>'Cartons'],  
        ]);
    }
}
