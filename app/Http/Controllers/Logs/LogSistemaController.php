<?php

namespace App\Http\Controllers\Logs;

use App\Http\Controllers\Controller;
use App\Models\Logs\Log_sistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogSistemaController extends Controller
{
    public static function logSistemaTipoInsert($tabela, $descricao)
    {
        $log             = new Log_sistema();
        $log->tabela     = $tabela;
        $log->tipo       = 1;
        $log->descricao  = json_encode($descricao);
        $log->fk_empresa = Auth::user()->fk_empresa;
        $log->fk_usuario = Auth::user()->id;
        return $log->save();   
    }

    public static function logSistemaTipoUpdate($id, $id_ou_fk, $tabela, $descricao)
    {
        // Quando é update preciso guardar o ID do que estou editando
        $descricao[$id_ou_fk] = $id;
        
        $log             = new Log_sistema();
        $log->tabela     = $tabela;
        $log->tipo       = 2;
        $log->descricao  = json_encode($descricao);
        $log->fk_empresa = Auth::user()->fk_empresa;
        $log->fk_usuario = Auth::user()->id;
        return $log->save();   
    }
}
