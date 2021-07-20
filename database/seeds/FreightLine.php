<?php

use Illuminate\Database\Seeder;

class FreightLine extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('freight_lines')->insert([
            ['shipping_line' => 'CCNI'],
            ['shipping_line' => 'China Shipping'],
            ['shipping_line' => 'CMA-CGM'],
            ['shipping_line' => 'Cosco'],
            ['shipping_line' => 'Delmas'],
            ['shipping_line' => 'Evergreen'],
            ['shipping_line' => 'Hamburg Sud'],
            ['shipping_line' => 'Hanjin'],
            ['shipping_line' => 'Hapag Lloyd'],
            ['shipping_line' => 'Hyundai'],
            ['shipping_line' => 'Maersk'],
            ['shipping_line' => 'MOL'],
            ['shipping_line' => 'MSC'],
            ['shipping_line' => 'NileDutch'],
            ['shipping_line' => 'NYK'],
            ['shipping_line' => 'One'],
            ['shipping_line' => 'OOCL'],
            ['shipping_line' => 'PIL'],
            ['shipping_line' => 'Safmarine'],
            ['shipping_line' => 'Sealand'],
            ['shipping_line' => 'TBI'],
            ['shipping_line' => 'UASC'],
            ['shipping_line' => 'Yang Ming'],
            ['shipping_line' => 'Zim'],
        ]);
    }
}
