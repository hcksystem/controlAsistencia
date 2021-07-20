<?php

use Illuminate\Database\Seeder;

class MvTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mv_types')->insert([
            ['concept' => 'IN'],
            ['concept' => 'OUT'],
            ['concept' => 'NEUTRAL'],
            ['concept' => 'DIRECT'],
        ]);
    }
}
