<?php

use Illuminate\Database\Seeder;

class AccountCategorySedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('account_categories')->insert([
            ['name'=>'Customer', 'description'=>'', 'active'=> 1],  
            ['name'=>'Provider', 'description'=>'', 'active'=> 1],  
            ['name'=>'Partner', 'description'=>'', 'active'=> 1],   
            ['name'=>'Supplier', 'description'=>'', 'active'=> 1],   
        ]);
    }
}
