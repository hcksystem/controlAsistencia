<?php

use Illuminate\Database\Seeder;

class IncotermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incoterms')->insert([
            ['name' => 'EXW', 'description' => 'description','status'=> 1],
            ['name' => 'FCA', 'description' => 'description','status'=> 1],
            ['name' => 'FAS', 'description' => 'description','status'=> 1],
            ['name' => 'FOB', 'description' => 'description','status'=> 1],
            ['name' => 'CFR-CPT', 'description' => 'description','status'=> 1],
            ['name' => 'CIF-CIP', 'description' => 'description','status'=> 1],
            ['name' => 'DDU', 'description' => 'description','status'=> 1],
            ['name' => 'DDP', 'description' => 'description','status'=> 1],
        ]);
    }
}
