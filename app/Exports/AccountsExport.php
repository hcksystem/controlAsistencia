<?php

namespace App\Exports;

use App\VAccount;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   	 public function headings(): array
    {
        return [
        	'id',
            'name',
            'short_name',
            'identification',
            'website',
            'address',
            'zipcode', 
            'phone',
            'email',  
            'business_description',  
            'country',
            'profit_center'     
        ];
    }
    public function collection()
    {
        return VAccount::all();
    }

}
