<?php

namespace App\Http\Requests;

use App\Rules\CpfRule;
use App\Rules\LoginRule;
use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class SalvarUsuarioRequest extends FormRequest
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
            'fk_tipo_usuario' => 'required',
            'nome' => 'required',
            'data_nascimento' => 'required',
            'cpf' => ['required', 'string', new CpfRule],
            'email' => 'required|email',
            'celular' => 'required|min:16|max:16',
            'login' => ['required', 'min: 6', new LoginRule],
            'senha' => ['required', 'string', new PasswordRule],
            'repita_senha' => ['required', 'string', new PasswordRule, 'same:senha'],
            'numero' => 'max:10',
        ];
    }

    public function messages()
    {
        return [
            'fk_tipo_usuario.required' => 'O campo tipo de usuário é obrigatório.',
            'celular.min' => 'Celular digitado inválido',
            'celular.max' => 'Celular digitado inválido',
            'numero.max' => 'O campo número deve conter no máximo 10 carácter',
        ];
    }
}
