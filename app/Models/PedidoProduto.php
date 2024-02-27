<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;


class PedidoProduto extends Model
{
    use HasFactory;
    protected $fillable = ['pedido_id', 'produto_id'];
    protected $table = 'pedidos_produtos';

    public function pedido(): belongsTo 
    {
        return $this->belongsTo(Pedido::class, 'pedido_id', 'id');
    }
    public function produto(): belongsTo
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}
