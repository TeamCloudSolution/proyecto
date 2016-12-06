<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\image;

class ProductoRequest extends Request
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
    {switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'NOMBRE'=>'min:3|max:50|required|unique:producto',
                    'DESCRIPCION'=>'min:10|max:200',
                    'PRECIO'=>'numeric|min:1|required',
                    'STOCK'=>'numeric|min:1|required',
                    'ID_CATEGORIA'=>'required',
                    'RUTA_IMAGEN' =>'mimes:jpeg,jpg,png'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'NOMBRE'=>'min:3|max:50|required',
                    'DESCRIPCION'=>'min:5|max:200',
                    'PRECIO'=>'required|numeric|min:1',
                    'STOCK'=>'required|numeric|min:1',
                    'ID_CATEGORIA'=>'required',
                    'RUTA_IMAGEN' =>'mimes:jpeg,jpg,png'
                ];
            }
        }
    }
}
