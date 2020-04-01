<?php

namespace App\Helpers;

class Helper
{
    public static function currencyBrForMysql($valor)
    {
        $valor2 = str_replace('.', '', $valor);
        
        return str_replace(',', '.', $valor2);
    }

    public static function currencyMysqlForBr($valor)
    {
        return number_format($valor, 2, ',', '.');
    }

    public static function mysqlToDate($date)
    {
        return date("d/m/Y", strtotime($date));
    }

    public static function dateToMysql($date)
    {
        $explode = explode("/", $date);
        
        return date('Y-m-d', strtotime($explode[2]."-".$explode[1]."-".$explode[0]));
    }

    public static function formatCpf($cpf)
    {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
    }
}