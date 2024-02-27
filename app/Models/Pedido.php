<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id'];

    public function cliente(): HasOne
    {
        return $this->HasOne(Cliente::class, 'id', 'cliente_id');
    }
}
