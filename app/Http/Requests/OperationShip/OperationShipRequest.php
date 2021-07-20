<?php

namespace App\Http\Requests\OperationShip;

use Illuminate\Foundation\Http\FormRequest;

class OperationShipRequest extends FormRequest
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
            // 'date_availability'     => 'date',
            // 'date_appointment'      => 'date',
            // 'freight_rate'          => 'integer', 
            // 'est_vessel'            => 'date',
            // 'est_etd'               => 'date',
            // 'est_eta'               => 'date'
        ];
    }
}