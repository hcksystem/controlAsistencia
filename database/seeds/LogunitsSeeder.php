<?php

use Illuminate\Database\Seeder;

class LogunitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('logunits')->insert([
            ['name' => '20Dry', 'description' => 'description','active'=> 1],
            ['name' => '20Re', 'description' => 'description','active'=> 1],
            ['name' => '40Dry', 'description' => 'description','active'=> 1],
            ['name' => '40Re', 'description' => 'description','active'=> 1],
            ['name' => 'Bulk', 'description' => 'description','active'=> 1],
            ['name' => 'Truck', 'description' => 'description','active'=> 1],
            ['name' => 'AirFreight', 'description' => 'description','active'=> 1],
        ]);
    }
}
