<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleOrderRequest extends FormRequest
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
            'name'          => 'required',
            'quantity'      => 'required|min:1',
            'unit_price'    => 'required|min:1',
            'net_price'     => 'required|min:1',
            'description'   => 'required|min:5',
            'pay'           => 'required',
            'advance'       => 'lte:net_price',
            'date_of_sale'  => 'required',
            'employe_id'    => 'required',
            'office_id'     => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required'             => 'Ingrese el nombre del producto',
            'quantity.required'         => 'Ingrese la cantidad del producto',
            'quantity.min'              => 'La cantidad del producto no puede ser menor o igual a 0',
            'unit_price.required'       => 'El precio unitario no puede ser menor o igual a 0',
            'net_price.required'        => 'El precio neto no puede ser menor o igual a 0',
            'description.required'      => 'Ingrese una descripción del producto',
            'description.min'           => 'La descripción deb tener al menos 5 caracteres',
            'pay.required'              => 'Seleccione una forma de pago',
            'advance.lte'               => 'El anticipo no puede ser mayor al precio neto',
            'date_of_sale.required'     => 'Ingrese la fecha de venta',
            'employe_id.required'       => 'Seleccione la persona que atendio al cliente',
            'office_id'                 => 'Seleccione una sucursal'
        ];
    }
}
