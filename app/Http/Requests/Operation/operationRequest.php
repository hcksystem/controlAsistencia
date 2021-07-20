<?php

namespace App\Http\Requests\Operation;

use Illuminate\Foundation\Http\FormRequest;

class operationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date_order'            => 'required',
            'operation_status_id'   => 'required',
            'business_line_id'      => 'required', 
            'principal_id'          => 'required'
            //'supplier_id'           => 'required',
            //'dead_line_ship'        => 'date|after:ship_from'
        ];
    }
}