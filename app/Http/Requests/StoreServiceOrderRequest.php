<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceOrderRequest extends FormRequest
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
            'equip'                 => 'required',
            'brand'                 => 'required',
            'features'              => 'required',
            'failure'               => 'required',
            'solicited_service'     => 'required',
            'employe_id'            => 'required',
            'office_id'             => 'required',
            'pay'                   => 'required',
        ];
    }

    public function messages()
    {
        return[
            'equip.required'                => 'Ingrese el nombre del equipo',
            'brand.required'                => 'Ingrese el modelo del equipo',
            'features.required'             => 'Ingrese las características del equipo',
            'failure.required'              => 'Ingrese la falla del equipo',
            'solicited_service.required'    => 'Ingrese el servicio solicitado',
            'employe_id.required'           => 'Seleccione la persona que atendio',
            'office_id.required'            => 'Seleccione una sucursal',
            'pay.required'                  => 'Ingrese el metodo de pago',
        ];
    }
}
