<?php

namespace App\Http\Requests\DocsInstruction;

use Illuminate\Foundation\Http\FormRequest;

class DocsInstructionRequest extends FormRequest
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
            'account_id'   => 'required',
            'bl_cnee'      => 'required',
            'bnl_ntfly'    => 'required',
            'certs_cnee'   => 'required',
        ];
    }
}