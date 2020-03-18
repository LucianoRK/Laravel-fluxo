<?php

namespace App\Http\Requests;

use App\Rules\CpfRule;
use App\Rules\LoginEditRule;
use App\Rules\PasswordEditRule;
use Illuminate\Foundation\Http\FormRequest;

class SalvarEdicaoUsuarioRequest extends FormRequest
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
            'nome' => 'required',
            'data_nascimento' => 'required',
            'cpf' => ['required', 'string', new CpfRule],
            'email' => 'required|email',
            'celular' => 'required|min:16|max:16',
            'numero_casa' => 'max:10',
            'senha' => [new PasswordEditRule],
            'repita_senha' => [new PasswordEditRule, 'same:senha'],
        ];
    }

    public function messages()
    {
        return [
            'celular.min' => 'Celular digitado inválido',
            'celular.max' => 'Celular digitado inválido',
            'numero_casa.max' => 'O campo número deve conter no máximo 10 carácter',
        ];
    }
}
