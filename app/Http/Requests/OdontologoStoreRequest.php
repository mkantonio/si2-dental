<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OdontologoStoreRequest extends FormRequest
{

    protected $redirectRoute = 'odontologos.create';
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
            'CI' => 'required',
            'Nombre' => 'required',
            'Apellido' => 'required',
            'Sexo' => 'required',
            'Direccion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'CI.required' => 'CI es campo requerido',
            'Nombre.required' => 'Nombre es campo requerido',
            'Apellido.required' => 'Apellido es campo requerido',
            'Sexo.required' => 'Sexo es campo requerido',
            'Direccion.required' => 'Direccion es campo requerido',
        ];
    }
}
