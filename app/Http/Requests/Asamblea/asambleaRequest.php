<?php

namespace App\Http\Requests\Asamblea;

use Illuminate\Foundation\Http\FormRequest;

class asambleaRequest extends FormRequest
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
            'edificio_id' => 'required',
            'asunto'    => 'required',
            'fecha'    => 'required' 
        ];
    }
}
