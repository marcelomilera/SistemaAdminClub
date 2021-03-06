<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreReservaAmbiente extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fecha_inicio'            =>  'required|date',
            'fecha_fin'     =>  'required|date',
                                    
        ];
    }
}
