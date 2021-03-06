<?php

namespace Park\Http\Requests;

use Park\Http\Requests\Request;

class EmpresaRequest extends Request
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
            'nit'   => 'required|integer',
            'nombre'    => 'required',
            'ciudad'    => 'required',
            'direccion'   => 'required',
            'telefono'   => 'required|integer'
        ];
    }
}
