<?php

namespace App\Imports;

use App\Operation;
use Maatwebsite\Excel\Concerns\ToModel;

class OperationsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Operation([
            'code'     => $row[0],
            'date_order'    => $row[1], 
        ]);
    }
}
