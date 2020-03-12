<?php

/* LOGIN */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

{
    Route::get('/login', 'Auth\LoginController@index')->name('login');
    Route::post('/logar', 'Auth\LoginController@logar')->name('logar');
}

/* AUTENTICADO */
Route::group(['middleware' => ['auth']], function () {
    
    /* SAIR DO SISTEMA */ {
        Route::get('/sair', function () {
            Auth::logout();
            return redirect()->route('login');
        });
    }

    /* HOME */ {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/', 'HomeController@index')->name('home');
    }

    /* USUARIOS */ {
        Route::resource('usuarios', 'UsuarioController');
        Route::put('/usuarios/ativar/{id}', 'UsuarioController@ativar');
    } 

    /* AGENDA */ {
        Route::resource('agenda', 'AgendaController');
    } 

    /* ENDEREÇO */ {
        Route::post('/endereco/comboCidades', 'CidadeController@index')->name('comboCidades');;
    }
});
