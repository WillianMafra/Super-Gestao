<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'nome', 'peso', 'unidade_id', 'fornecedor_id'];

    public function produtoDetalhe(): HasOne
    {
        return $this->hasOne(produtoDetalhe::class, 'produto_id', 'id');
    }

    public function unidade(): HasOne
    {
        return $this->hasOne(Unidade::class, 'id', 'unidade_id');
    }

    public function item_pedido(): HasMany
    {
        return $this->hasMany(PedidoProduto::class, 'produto_id', 'id');
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
    }

}
