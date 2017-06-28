<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Produto_imagens extends Model
{
    protected $fillable = ['titulo',
                           'nm_imagem',
                           'ordem',
                           'produto_id',
                          ];
        
    public function produto(){

        return $this->belongsTo(Produtos::class);

    }
}