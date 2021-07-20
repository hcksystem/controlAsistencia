<?php

namespace App\Exports;

use App\LateDepositS;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LateDepositSExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LateDepositS::all();
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
            'DepositPayableSupplier',
            'DAYS TO ETD',
            'BUYER',
            'SELLER', 
            'BUYER PROFITCENTER',
            'SELLER PROFITCENTER'
        ];
    }
}
