<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logAcesso extends Model
{
    use HasFactory;
    protected $fillable = ['rota', 'ip'];
}
