<?php

namespace papusclub\Http\Requests;
use papusclub\Http\Requests\Request;

class StorePromocionRequest extends Request
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
            'estado'                =>  'required|max:12|string',
            'descripcion'           =>  'required|max:100|string',
            'montoDescuento'        =>  'required|integer|min:1',
            'porcentajeDescuento'   =>  'required|integer|min:1'
            // 'fecha_registro'        =>  'date'
            
            
            
        ];
    }
}