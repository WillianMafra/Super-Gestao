<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'estado_id', 'email']; // Para tornar acessivel a criação via metodo create no tinker \App\Models\Fornecedor::create(arrayDados)
    use HasFactory;

    public function produtos(): HasMany
{
    $this->hasMany(Produto::class)
}
}
