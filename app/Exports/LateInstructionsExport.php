<?php

namespace App\Exports;

use App\LateInstructions;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LateInstructionsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LateInstructions::all();
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
            'BL CNEE',
            'DAYS TO ETD',
            'BUYER',
            'SELLER', 
            'BUYER PROFITCENTER',
            'SELLER PROFITCENTER'
        ];
    }
}
