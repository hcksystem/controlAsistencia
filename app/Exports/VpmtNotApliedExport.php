<?php

namespace App\Exports;

use App\VpmtNotAplied;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VpmtNotApliedExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VpmtNotAplied::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'movement_date',
            'partner',
            'movement',
            'currency',
            'amount',
            'spread',
            'bank' 
        ];
    }
}
