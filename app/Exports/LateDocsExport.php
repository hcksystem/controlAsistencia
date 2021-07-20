<?php

namespace App\Exports;

use App\LateDocs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LateDocsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LateDocs::all();
    }

    public function headings(): array
    {
        return [
            'OP',
            'ORDER',
            'SUPPLIER',
            'CUSTOMER',
            'STATUS',
            'STATUS COMMENTS',
            'DAYS TO ETD',
            'BUYER',
            'SELLER', 
            'BUYER PROFITCENTER',
            'SELLER PROFITCENTER'
        ];
    }
}
