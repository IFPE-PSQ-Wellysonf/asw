<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = 'salas';
    protected $fillable = ['descricao','localizacao','capacidade'];
}
