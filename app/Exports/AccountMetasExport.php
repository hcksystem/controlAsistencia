<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class AccountMetasExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   	 public function headings(): array
    {
        return [
        	'#',
            'Account',
            'Account Meta Types',
            'Value'      
        ];
    }
    public function collection()
    {
         return DB::table('account_metas')
            ->join('accounts', 'account_metas.account_id', '=', 'accounts.id')
            ->join('account_meta_types', 'account_metas.account_meta_type_id', '=', 'account_meta_types.id')
            ->select('account_metas.id', 'accounts.name', 'account_meta_types.metatype','account_metas.value')
            ->get();
    }

}