<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientsFormRequest extends FormRequest
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
            //
           'name'       => 'required',
           'rg'         => 'required|min:7|max:9',
           'cpf'        => 'required|min:11|max:14',
           'cnh'        => 'required|min:11|max:14',
           'endereco'   => 'required',
           'fone'       => 'required|min:11|max:14'
        ];              
    }
}
