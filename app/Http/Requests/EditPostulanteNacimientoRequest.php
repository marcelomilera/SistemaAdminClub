<?php

namespace papusclub\Http\Requests;

use papusclub\Http\Requests\Request;

class EditPostulanteNacimientoRequest extends Request
{


    protected $errorBag = 'nacimiento';

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
/*         var_dump($this->all());
        die();*/
        return [

            'fecha_nacimiento' => 'required | string',
            'direccion_nacimiento' => 'required | string',

            'departamento' => 'required_if:nacionalidad1,peruano',
            //'provincia' => 'required_if:nacionalidad1,peruano'  ,
            //'distrito' => 'required_if:nacionalidad1,peruano',
            'direccion_nacimiento'=>'required_if:nacionalidad1,peruano',

            'pais_nacimiento'=>'required_if:nacionalidad1,extranjero',
            'lugar_nacimiento'=>'required_if:nacionalidad1,extranjero'
        ];
    }

    public function messages()
    {
        return [
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio ',
            'fecha_nacimiento.string'=>'El campo fecha de nacimiento debe tener formáto válido',

            'departamento.required_if'=>'El campo departamento es obligatorio',
            'provincia.required_if'=>'El campo provincia es obligatorio',
            'distrito.required_if'=>'El campo distrito es obligatorio',
            'direccion_nacimiento.required_if'=>'El campo dirección de nacimiento es obligatorio',
            'pais_nacimiento.required_if'=>'El campo país de nacimiento es obligatorio',
            'lugar_nacimiento.required_if'=>'El campo ciudad es obligatorio'
        ];
    }
}
