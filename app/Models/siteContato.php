<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siteContato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'site',
        'email',
        'motivo_contato',
        'mensagem',
        'telefone'
    ];
}
