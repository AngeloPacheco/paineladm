<?php

namespace App\Models\painel;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [ 'id',
                            'razao_social',
                            'nome_fantasia',
                            'responsavel',
                            'cnpj',
                            'inscricao_estadual',
                            'numero',
                            'complemento',
                            'email',
                            'site',
                            'telefone',
                            'fax',
                            'celular',
                            'logradouro_id',
                        ];
     
    
    public function logradouro(){
    
      return $this->belongsTo(Logradouros::class);
    
    }                        
}