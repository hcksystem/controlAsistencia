<?php

namespace App\Exports;

use App\Operation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class OperationsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            '#',
            'code',
            'date_order',
            'status',
            'business_lines',
            'principal',
            'principal_bank',
            'principal_com',
            'supplier',
            'supplier_commercial',  
            'proforma',
            'cus_commercial_id', 
            'cus_ref',
            'purchase_by',
            'su_po_signed',
            //
            'sale_by',
            'cu_po_signed',
            'purchase_broker_id',
            'p_broker_com_mt',
            'sale_broker_id',
            's_broker_com_mt',
            'supplier_bank_id',
            'customer_bank_id',
            'p_modality',
            'p_advanced',  
            'p_days',
            's_modality', 
            's_advanced',
            's_days',
            'purchase_incoterm',
            //
            'purchase_curr',
            'p_incoterm_place',
            'sale_incoterm',
            'sale_curr',
            'customer_id',
            'ship_from',
            'dead_line_ship',
            'cargo_unit',
            'log_unit',
            'nb_log_units',  
            'pol',
            'origin', 
            'pod',
            'final_destination',
            'est_freight_u',
            //
            'est_inland_u',
            'est_legal_u',
            'add_instructions',
            'comments',
            'status_comments',
            'created_at',
            'update_at',
            'order_quantity_budget',
            'order_sale',
            'order_sale_currency_id',  
            'order_sale_currency_change',
            'order_sale_usd', 
            'order_purchase',
            'order_purchase_currency_id',
            'order_purchase_change',
            //
            'order_purchase_usd',
            'total_est_charges',
            'est_charges',
            'comtopay',  
            'comotoreceive',
            'usd_budget',
            'Total Sale',
            'Total Purchase',
            'Rcvd Customer',
            'Discount Customer',
            'Receivable Customer',
            'Due To Date Customer',
            'Paid Supplier',  
            'Discount Supplier',
            'Payable Supplier', 
            'Due To Date Supplier',
            'Freight Amount',
            'Paid Freight',
            //
            'Freight Payable',
            'Com principal',
            'Rcvd Principal',
            'Com Receivable',
            'Com Brockers',
            'Paid Com',  
            'Com Payable',
            'Other Payments', 
            'USDNTP',
            'USDNTP vs Budget',
            'Operation',
            //
            'Supplier Admin',
            'Supplier Ops',
            'Date Availability',
            'Labels Received',
            'Labels Ok',
            'Cust Amin',
            'Cust Ops',
            'Docs Instruction',
            'Insp Ref',
            'Licence Ok',  
            'Date Appointment',
            'Pickup Location', 
            'Instruction Inland',
            'Freight Rate',
            'Cust Off Docs',
            //
            'Booking Ref',
            'Est Vessel',
            'Est ETD',
            'Est ETA'
        
        ];
    }

    public function collection()
    {
        return DB::table('voperationsall')->get();
    }

}
