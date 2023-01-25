<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
          'idvehiculo' => 'required',
          'patente' => 'required|max:50',
          'marca'  => 'required|max:100',
          'modelo' => 'required|max:100',
          'venta' => 'required|numeric',
          'descripcion' => 'max:512',
          'imagen' => 'mimes:jpeg,bmp,png'


        ];
    }
}
