<?php

use Illuminate\Support\Facades\Auth;
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

    /* CRUD USUARIOS */
    Route::resource('usuarios', 'UsuarioController');
    Route::put('/usuarios/ativar/{id}', 'UsuarioController@ativar');
    Route::get('/minhaConta', 'UsuarioController@minhaConta');
    Route::put('/usuarios/ativar/{id}', 'UsuarioController@ativar');
    Route::put('/usuarios/ativar/{id}', 'UsuarioController@ativar');
    /* HOME */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');
    /* HOME */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    Route::post('/alterarSenha', 'UsuarioController@alterarSenha')->name('alterarSenha');

    /* HOME */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('home');

    /* CLIENTES */
    Route::post('/lista-clientes-filtrado', 'ClienteController@listaClientesFiltrado');
    Route::post('/listaClientesFiltradoNavbar', 'ClienteController@listaClientesFiltradoNavbar');
    Route::get('/informacoesCliente/{id}', 'ClienteController@mostraTodosDadosCliente')->name('dadosCliente');

    /* AGENDA */
    Route::resource('agenda', 'AgendaController');
    Route::post('agenda-lista', 'AgendaController@getAgendados');
    Route::post('gravar-avaliacao', 'AgendaController@gravarAvaliacao');
    Route::post('gravar-agendamento-tratamento', 'AgendaController@gravarAgendamentoTratamento');
    Route::post('presenca', 'AgendaController@presenca');
    Route::post('cancelar-agendamento', 'AgendaController@cancelarAgendamento');

    /* CLIENTES */
    Route::post('/lista-clientes-filtrado', 'ClienteController@listaClientesFiltrado');
    Route::post('/listaClientesFiltradoNavbar', 'ClienteController@listaClientesFiltradoNavbar');
    Route::get('/informacoesCliente/{id}', 'ClienteController@mostraTodosDadosCliente')->name('dadosCliente');

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
    Route::resource('clientes', 'ClienteController');

    /* DEPENDENTE */

    Route::resource('dependentes', 'DependenteController');

    /* TRATAMENTOS */
    Route::resource('tratamentos', 'TratamentoController');
});
