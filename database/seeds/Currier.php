<?php

use Illuminate\Database\Seeder;

class Currier extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriers')->insert([
            ['id' => 1, 'currier_name' => 'DHL', 'description' => ''],
            ['id' => 2, 'currier_name' => 'FEDEX', 'description' => ''],
            ['id' => 3, 'currier_name' => 'TNT', 'description' => ''],
            ['id' => 4, 'currier_name' => 'UPS', 'description' => '']
        ]);
    }
}
