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
            'autor',
            'departamento',
            'clasificacion',
            'detalles',
            'respuesta',
            'status',
            'observacion',
        ];
    }
}
