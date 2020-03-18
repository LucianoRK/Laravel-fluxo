<?php

namespace App\Rules;

use App\Models\Usuarios\Usuario;
use Illuminate\Contracts\Validation\Rule;

class LoginRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $usuario = new Usuario();
        $login = $usuario->verificaLoginExiste($value); 

        if ($login) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O usuário informado já existe';
    }
}
