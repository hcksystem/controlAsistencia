<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ProductGensExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            '#',
            'Product Line',
            'Gen',
            'Specifications',
            'Cold Chain'
        ];
    }
    public function collection()
    {
        return DB::table('product_gens')->get();
    }

}
