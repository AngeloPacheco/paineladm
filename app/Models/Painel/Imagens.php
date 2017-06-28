<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Imagens extends Model
{
    protected $fillable = ['nm_imagem','titulo','conteudo_id','conteudo_tipo','ordem'];
    
}
