<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class AccountMetaTypeExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   	 public function headings(): array
    {
        return [
        	'#',
            'Metatype',
            'Description',
            'Active'      
        ];
    }
    public function collection()
    {
          return DB::table('account_meta_types')->select('id','metatype','description','active')->get();
    }

}