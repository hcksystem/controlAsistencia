<?php

use Illuminate\Database\Seeder;

class DocStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doc_statuses')->insert([
            ['id' => 1, 'name' => 'Drafts Shipper Pending'],
            ['id' => 2, 'name' => 'Draft Approval Pending'],
            ['id' => 3, 'name' => 'Originals Pending'],
            ['id' => 4, 'name' => 'Originals Approved']
        ]);
    }
}
