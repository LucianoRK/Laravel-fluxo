<?php

namespace App\Http\Requests;

use App\Rules\CnpjRule;
use Illuminate\Foundation\Http\FormRequest;

class SalvarRadiologistaRequest extends FormRequest
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
            'razao_social' => 'required',
            'nome_fantasia' => 'required',
            'cnpj' => ['required', 'string', new CnpjRule],
            'email' => 'required|email',
            'celular' => 'required|min:16|max:16',
            'cep' => 'required|max:9|min:9',
            'estado' => 'required',
            'cidade' => 'required',
            'logradouro' => 'required',
            'numero' => 'max:10',
            'bairro' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'celular.min' => 'Celular digitado inválido',
            'celular.max' => 'Celular digitado inválido',
            'numero.max' => 'O campo número deve conter no máximo 10 carácter',
        ];
    }
}
