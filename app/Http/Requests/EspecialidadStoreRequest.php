<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecialidadStoreRequest extends FormRequest
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
            'Nombre' => 'required',
            'Descripcion' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'Nombre.required' => 'Nombre es campo requerido',
            'Descripcion.required' => 'Descripcion es campo requerido',
        ];
    }
}
