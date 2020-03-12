<?php

namespace App\Http\Requests;

use App\Rules\CpfRule;
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
            'fk_empresa' => 'required',
            'fk_tipo_usuario' => 'required',
            'nome' => 'required',
            'cpf' => ['required', 'string', new CpfRule],
            'email' => 'required|email',
            'celular' => 'min: 16| max:16',
            'data_nascimento' => 'required',
            'login' => 'required| min: 6',
            'senha' => ['required', 'string', new PasswordRule],
            'repita_senha' => ['required', 'string', new PasswordRule, 'same:senha'],
        ];
    }

    public function messages()
    {
        return [
            'fk_empresa.required' => 'O campo empresa é obrigatório.',
            'fk_tipo_usuario.required' => 'O campo tipo de usuário é obrigatório.',
        ];
    }
}
