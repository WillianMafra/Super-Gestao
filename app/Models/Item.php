<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'nome', 'peso', 'unidade_id'];
    protected $table = 'produtos';

    public function itemDetalhe(): HasOne {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }
}
