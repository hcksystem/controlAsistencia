<?php

namespace App\Http\Controllers;

use App\Account;
use DB;
use App\Operation;
use Illuminate\Http\Request;
use App\Http\Requests\Document\CreateRequest;
use App\Http\Requests\Document\updateRequest;


class PdfController extends Controller
{

     private $account;
     private $operations;

     /**
     * { function_description }
     *
     * @param      \App\Document  $document  The document
     */
    public function __construct(Account $account,Operation $operations)
    {
        $this->account = Account::get()->pluck('name', 'id');
        $this->operations = Operation::get()->pluck('code', 'id');
    }

     public function invoice($id_operation,$name) 
    {
       
        //factura 5 
        $operations = DB::table('vpurchase_order')->where('id',$id_operation)->first();

        $v1 = DB::table('vinvoice')->where('id','=',$id_operation)->first();

        $v2 = DB::table('vinvoice_details')->where('operation_id','=',$id_operation)->get();
        $v3 = DB::table('vpodetails_total')->where('operation_id','=',$id_operation)->first();
        
        $logo = DB::table('accounts')->where('name', $v1->seller_name)->value('id');
        //dd($logo);

        $vsodetails = DB::table('vpodetails')->where('operation_id', $id_operation)->get();

        $view =  \View::make('pages.operation.pdf.'.$name,compact('v1','v2','v3','logo','vsodetails'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function invoice2($id_operation,$name) 
    {
        //factura4

        $v1 = DB::table('vinvoice')->where('id','=',$id_operation)->first();
        $v2 = DB::table('vinvoice_details')->where('operation_id','=',$id_operation)->get();
        $v3 = DB::table('vsodetails_total')->where('operation_id','=',$id_operation)->first();

      
        $logo = DB::table('accounts')->where('name', $v1->buyer_name)->value('id');

        $vsodetails = DB::table('vsodetails')->where('operation_id', $id_operation)->get();


        $view =  \View::make('pages.operation.pdf.'.$name, compact('v1','v2','v3','vsodetails','logo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function invoice3($id_operation){

        $operations = DB::table('vsale_order')->where('id',$id_operation)->first();

        $v1 = DB::table('vinvoice')->where('id','=',$id_operation)->first();

        $v2 = DB::table('vinvoice_details')->where('operation_id','=',$id_operation)->get();
        $v3 = DB::table('vinvoice_totals')->where('operation_id','=',$id_operation)->first();
        //dd($id_operation);
        //dd($v2);
        $order_date = $operations->order_date;
        
        $seller_name = $operations->seller_name;
        $payment_terms = $operations->payment_terms;
        $other_info = $operations->other_info;

        $bank_name = $operations->bank_name;
        $bank_addres = $operations->bank_addres;
        $swift_code = $operations->swift_code;
        $aba = $operations->aba;
        $benefaccount_ibank = $operations->benefaccount_ibank;
        $acc_currency = $operations->acc_currency;
        $beneficiary_name = $operations->beneficiary_name;
        $intermediary_info = $operations->intermediary_info;

        $logo = DB::table('accounts')->where('name', $seller_name)->value('id');

        $view =  \View::make('pages.operation.pdf.factura1',compact('order_date','logo','payment_terms','other_info','bank_name','bank_addres','swift_code','aba','benefaccount_ibank','acc_currency','beneficiary_name','intermediary_info','v1','v2','v3'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

     public function invoice4($id_operation){

        //packingList
        $operations = DB::table('vsale_order')->where('id',$id_operation)->first();
        
        $seller_name = $operations->seller_name;

        $logo = DB::table('accounts')->where('name', $seller_name)->value('id');
        $v1 = DB::table('vinvoice')->where('id','=',$id_operation)->first();
        $v2 = DB::table('vinvoice_details')->where('operation_id','=',$id_operation)->get();
        $v3 = DB::table('vinvoice_totals')->where('operation_id','=',$id_operation)->first();

        $view =  \View::make('pages.operation.pdf.packingList',compact('logo','v1','v2','v3'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function invoice5($id_operation){

        $operations = DB::table('vsale_order')->where('id',$id_operation)->first();
        $id = $operations->ID;
        $order_date = $operations->order_date;
        $purchase_order = $operations->purchase_order;
        $seller_name = $operations->seller_name;

        $v1 = DB::table('vinvoice')->where('id','=',$id_operation)->first();
        $v2 = DB::table('vinvoice_details')->where('operation_id','=',$id_operation)->get();
        $v3 = DB::table('vinvoice_totals')->where('operation_id','=',$id_operation)->first();
        $v4 = DB::table('vinstructions')->where('id','=',$id_operation)->first();

        $logo = DB::table('accounts')->where('name', $seller_name)->value('id');

        $buyer_name = $operations->buyer_name;
        $buyer_address = $operations->buyer_address;
        $buyers_country = $operations->buyer_country;
        $buyers_contact = $operations->buyer_contact;

        $operations2 = DB::table('vpurchase_order')->where('id',$id_operation)->first();
        if(isset($operations2)){
            $supplier_name = $operations2->supplier_name;
            $supplier_address = $operations2->supplier_address;
            $supplier_country = $operations2->supplier_country;
            $supplier_contact = $operations2->supplier_contact;
        }else{
            $supplier_name = "";
            $supplier_address = "";
            $supplier_country = "";
            $supplier_contact = "";
        }
        

        $ship_from = $operations->ship_from;
        $to = $operations->to;
        $origin = $operations->origin;
        $final_destination = $operations->final_destination;
        $loading_in = $operations->loading_in;
        $port_of_destination = $operations->port_of_destination;
        $incoterm = $operations->incoterm;
        $payment_terms = $operations->payment_terms;
        $other_info = $operations->other_info;

        $bank_name = $operations->bank_name;
        $bank_addres = $operations->bank_addres;
        $swift_code = $operations->swift_code;
        $aba = $operations->aba;
        $benefaccount_ibank = $operations->benefaccount_ibank;
        $acc_currency = $operations->acc_currency;
        $beneficiary_name = $operations->beneficiary_name;
        $intermediary_info = $operations->intermediary_info;

        $operations3 =  DB::table('vsodetails')->where('operation_id',$id_operation)->first();
        if(isset($operations3)){
            $product = $operations3->product;
            $price = $operations3->price;
            $quantity = $operations3->quantity;
            $total = $operations3->total;
            $currency = $operations3->currency;
        }else{
            $product = "";
            $price = "";
            $quantity = "";
            $total = "";
            $currency = "";
        }

       
        
        $operations4 =  DB::table('vsodetails_total')->where('operation_id',$id_operation)->first();

         if(isset($operations4)){
            $total_price = $operations4->total_price;
            $total_quantity = $operations4->total_quantity;
            $total_total = $operations4->total_total;
        }else{
            $total_price = "";
            $total_quantity = "";
            $total_total = "";
        }
        

        $vsodetails = DB::table('vsodetails')->where('operation_id', $id_operation)->get();


        $view =  \View::make('pages.operation.pdf.factura6',compact('id', 'order_date','operations','purchase_order','buyer_name','buyer_address','buyers_country','buyers_contact','supplier_name','supplier_address','supplier_country','supplier_contact','ship_from','to','origin','final_destination','loading_in','port_of_destination','incoterm','payment_terms','other_info','bank_name','bank_addres','swift_code','aba','benefaccount_ibank','acc_currency','beneficiary_name','intermediary_info','operations2', 'product','price','quantity','total','currency','total_price','total_quantity','total_total','v1','v2','v3','v4','logo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function invoice6($id_operation){

        //factura2
        $v1 = DB::table('vinvoice')->where('id','=',$id_operation)->first();
        $v2 = DB::table('vinvoice_details')->where('operation_id','=',$id_operation)->get();
        $v3 = DB::table('vinvoice_totals')->where('operation_id','=',$id_operation)->first();
        $v4 = DB::table('vinstructions')->where('id','=',$id_operation)->first();

        $logo = DB::table('accounts')->where('name', $v1->seller_name)->value('id');
        
        $view =  \View::make('pages.operation.pdf.factura2',compact('v1','v2','v3','v4','logo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
}
