<?php

use Illuminate\Database\Seeder;

class OperationStatusSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('operation_status')->insert([
            ['name' => 'Being scheduled', 'description' => 'description'],
            ['name' => 'Programmed', 'description' => 'description'],
            ['name' => 'Shipped docs in process', 'description' => 'description'],
            ['name' => 'Docs OK Pending release', 'description' => 'description'],
            ['name' => 'Cargo Released Pending Payment', 'description' => 'description'],
            ['name' => 'Pending OK to close', 'description' => 'description'],
            ['name' => 'Closed', 'description' => 'description'],
            ['name' => 'Cancelled', 'description' => 'description'],
        ]);
    }
}
