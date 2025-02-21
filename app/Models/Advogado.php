<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advogado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'oab', 'estado_oab', 'email', 'telefone', 'endereco',
    ];

    public function processos()
    {
        return $this->hasMany(Processo::class);
    }
}
