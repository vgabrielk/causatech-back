<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'cpf', 'rg', 'email', 'telefone', 'endereco',
    ];

    public function processos()
    {
        return $this->hasMany(Processo::class);
    }
}
