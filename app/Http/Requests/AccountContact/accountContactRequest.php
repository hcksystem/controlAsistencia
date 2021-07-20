<?php

namespace App\Http\Requests\AccountContact;

use Illuminate\Foundation\Http\FormRequest;

class accountContactRequest extends FormRequest
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
            'first_name'  => 'required',
            'last_name'  => 'required',
            'fullname'  => 'required',
            'account_id' => 'required',
            'phone_company'=>'required',
            'email' => 'required'
        ];
    }
}
