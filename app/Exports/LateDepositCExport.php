<?php

namespace App\Exports;

use App\LateDepositC;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LateDepositCExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LateDepositC::all();
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
            'DepositReceivableCustomer',
            'DAYS TO ETD',
            'BUYER',
            'SELLER', 
            'BUYER PROFITCENTER',
            'SELLER PROFITCENTER'
        ];
    }
}
