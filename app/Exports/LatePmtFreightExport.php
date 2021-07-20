<?php

namespace App\Exports;

use App\LatePmtFreight;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LatePmtFreightExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LatePmtFreight::all();
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
