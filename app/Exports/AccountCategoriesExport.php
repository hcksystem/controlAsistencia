<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class AccountCategoriesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   	 public function headings(): array
    {
        return [
        	'#',
            'Name',
            'Description',
            'Active'      
        ];
    }
    public function collection()
    {
         return DB::table('account_categories')->select('id','name','description','active')->get();
    }

}