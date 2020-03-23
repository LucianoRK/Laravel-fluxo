<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Permissoes\Permissao_mm_usuario;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function logar(LoginRequest $request)
    {
       $dados = ['login'=>$request->login, 'password'=>$request->senha];
       
       if (Auth::attempt($dados)) {
            $permissoes = new Permissao_mm_usuario();
            $permissoes_user = $permissoes->getAllPermissoesUsuario(Auth::user()->id, Auth::user()->fk_empresa);

            if (count($permissoes_user) > 0) {
                foreach ($permissoes_user as $p) {
                    $array_permissao[] = $p->fk_permissao;
                }
            } else {
                $array_permissao = false;
            }

            // Gravo todas as permissões do usuário
            session()->put('permissoes', $array_permissao);

            return redirect()->intended('/');
       } else {
            return redirect()->back()->with('warning', 'Usuário ou senha incorreto!');
       }
    }

    public function sair() 
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
