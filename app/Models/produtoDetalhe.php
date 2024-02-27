<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'altura', 'comprimento', 'largura', 'unidade_id'];
}
