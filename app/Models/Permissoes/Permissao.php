<?php

namespace App\Models\Permissoes;
use Permissoes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permissao extends Model
{
    protected $table = 'permissoes';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'ativo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    public function getAllIdPermissoes()
    {
        $data = DB::table('permissoes')
        ->where([ ['ativo', '=', true], ])
        ->select('id')
        ->get();

        return $data; 
    }
}
