<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorTickets extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'autor'=>'required',
            'departamento'=>'required',
            'clasificacion'=>'required',
            'detalles'=>'required',
            'respuesta',
            'status',
            'observacion',
        ];
    }
}
