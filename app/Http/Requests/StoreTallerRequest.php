<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;
use papusclub\Models\TipoPersona;

class StoreTallerRequest extends Request
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

            'nombre' => 'required|max:60|string',
            'descripcion' =>'|max:200|string',
            'vacantes' =>'min:0',
            'fecIniIns' => 'required',
            'fecFinIns' => 'required',
            'fecIni' => 'required',
            'fecFin' => 'required',
            'cantidad_sesiones' => 'min:0',
            'trabajador' => 'required|float|min:0',
            'postulante' => 'required|float|min:0',
            'tercero' => 'required|float|min:0',

        ];
    }

    public function messages()
    {
        return [
            'fecIniIns.required' => 'El campo fecha inicio de inscripciones es obligatorio',
            'fecFinIns.required' => 'El campo fecha fin de inscripciones es obligatorio',
            'fecIni.required'=> 'El campo fecha inicio de taller es obligatorio',
            'fecFin.required'=>'El campo fecha fin de taller es obligatorio'

        ];
    }
}