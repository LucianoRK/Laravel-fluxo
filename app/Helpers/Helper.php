<?php

namespace App\Helpers;

class Helper
{
    static function currencyBrForMysql($valor)
    {
        $valor2 = str_replace('.', '', $valor);
        
        return str_replace(',', '.', $valor2);
    }

    static function currencyMysqlForBr($valor)
    {
        return number_format($valor, 2, ',', '.');
    }
}