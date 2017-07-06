<?php

namespace Park\Http\Requests;

use Park\Http\Requests\Request;

class SaveFotoRequest extends Request
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
            'nombre'         => 'required',
           
            'extract'        => 'required',
            'precio'         => 'required',
            'imag'         => 'required|image|max:20000',
            'album_id'       => 'required'
        ];
    }
}
