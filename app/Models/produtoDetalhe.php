<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class produtoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'altura', 'comprimento', 'largura', 'unidade_id'];
    public function produto(): BelongsTo {
        return $this->belongsTo(Produto::class, 'produto_id', 'id')->onDelete('cascade');
    }

}
