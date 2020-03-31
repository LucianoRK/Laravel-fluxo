<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/* PUBLICO - LOGIN */
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/logar', 'Auth\LoginController@logar')->name('logar');

/* AUTENTICADO */
Route::group(['middleware' => ['auth']], function () {
    
    /* SAIR DO SISTEMA */ 
    Route::get('/sair', function () {
        Auth::logout();
        return redirect()->route('login');
    });

    /* HOME */ 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    /* CRUD USUARIOS */ 
    Route::resource('usuarios', 'UsuarioController');
    Route::put('/usuarios/ativar/{id}', 'UsuarioController@ativar');
    Route::get('/minhaConta', 'UsuarioController@minhaConta');
    Route::post('/alterarSenha', 'UsuarioController@alterarSenha')->name('alterarSenha');
    
    /* AGENDA */ 
    Route::resource('agenda', 'AgendaController');
    Route::post('get-agendados', 'AgendaController@getAgendados');
    
    /* CLIENTES */
    Route::post('/lista-clientes-filtrado', 'ClienteController@listaClientesFiltrado');
    
    /* COMBO CIDADES */ 
    Route::post('/endereco/comboCidades', 'CidadeController@index')->name('comboCidades');;
    
    /* CRUD PROCEDIMENTOS CLÍNICA */ {
        // Categoria 
        Route::resource('procedimentosCategorias', 'ProcedimentoCategoriaController');
        
        // Procedimento 
        Route::resource('procedimentos', 'ProcedimentoController');
    }

    /* CRUD PROTÉTICO */
    Route::resource('proteticos', 'ProteticoController');
    Route::put('/proteticos/ativar/{id}', 'ProteticoController@ativar');

    /* CRUD RADIOLOGISTAS */
    Route::resource('radiologistas', 'Empresas\RadiologistaController');
    Route::put('/radiologistas/ativar/{id}', 'Empresas\RadiologistaController@ativar');

    /* CRUD FERIADOS */
    Route::resource('feriados', 'Feriados\FeriadoController');

    /* CLIENTE */
    Route::resource('clientes', 'Clientes\ClienteController');
});
