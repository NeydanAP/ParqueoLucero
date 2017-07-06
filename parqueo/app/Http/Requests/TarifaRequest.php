<?php

namespace Park\Http\Requests;

use Park\Http\Requests\Request;

class TarifaRequest extends Request
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
            'val_hora'   => 'required',
            'val_dia'    => 'required',
            'val_mes'    => 'required',
            'clase_id'   => 'required'
        ];
    }
}
