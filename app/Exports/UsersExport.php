<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   	 public function headings(): array
    {
        return [
        	'#',
            'Fullname',
            'E-mail',
            'Status',
            'Phone 1',
            'Phone 2',
            'Cell 1', 
            'Cell 2'      
        ];
    }
    public function collection()
    {
         return DB::table('users')->select('id','fullname','email','status','phone1','phone2','cell1','cell2')->get();
    }

}