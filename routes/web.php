<?php

/* LOGIN */ {
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
        Route::get('/', 'UsuarioController@index')->name('usuarios');
    } 
});
