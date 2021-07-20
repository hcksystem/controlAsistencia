<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class PortsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   	 public function headings(): array
    {
        return [
        	'#',
            'Name',
            'País'    
        ];
    }
    public function collection()
    {
         return DB::table('vportsWithCountries')->select('port_id','port_name','country_name')->get();
    }

}