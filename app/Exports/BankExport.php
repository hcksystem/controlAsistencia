<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BankExport implements FromView 
{

    private $id;

    public function __construct($bank=null)
    {
        $this->id = $bank;
    }

    public function view(): view{

        $bank = $this->id;
        return view("pages.payments.bank_export", compact("bank"));


    }
}
