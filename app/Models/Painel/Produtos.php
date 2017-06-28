<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = ['id',
                           'descricao',
                           'categoria_id',
                           'medida_id',
                           'estoque',
                           'preco_custo',
                           'margem_lucro',                   
                           'preco_venda',
                           'peso',
                           'alturaxlargura',
                           'cor',
                           'novidade',
                           'ativo',
                           'obs',
                        ];
        
public function categorias(){
    
    return $this->belongsTo(Categorias::class);
    
}
public function medidas(){
    return $this->belongsTo(Medidas::class);
}
}

