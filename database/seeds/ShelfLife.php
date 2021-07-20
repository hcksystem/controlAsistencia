<?php

use Illuminate\Database\Seeder;

class ShelfLife extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shelf_lifes')->insert([
            ['id' => 1, 'name' => '3 months'],
            ['id' => 2, 'name' => '4 months'],
            ['id' => 3, 'name' => '6 months'],
            ['id' => 4, 'name' => '9 months'],
            ['id' => 5, 'name' => '12 months'],
            ['id' => 6, 'name' => '18 months'],
            ['id' => 7, 'name' => '24 months'],
        ]);
    }
}
