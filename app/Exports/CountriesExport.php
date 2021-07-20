<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class CountriesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   	 public function headings(): array
    {
        return [
        	'#',
            'Name',
            'Code'    
        ];
    }
    public function collection()
    {
         return DB::table('countries')->select('id','name','code')->get();
    }

}