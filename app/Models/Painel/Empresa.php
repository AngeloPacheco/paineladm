<?php

namespace App\Models\painel;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['id',
                            'razao_social',
                            'nome_fantasia',
                            'responsavel',
                            'cnpj',
                            'inscricao_estadual',
                            'endereco',
                            'numero',
                            'complemento',
                            'bairro',
                            'cidade',
                            'uf',
                            'cep',
                            'email',
                            'site',
                            'telefone',
                            'fax',
                            'celular',
                       ];
}