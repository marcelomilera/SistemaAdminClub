<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class StoreObservacionRequest extends Request
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
            'nombre' => 'required|max:30|string',
            'dni' =>'min:0',
            'obs' =>'required|max:300|string',
        ];
    }
}
