<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = [
        'nome', 'cpf', 'rg', 'email', 'telefone', 'endereco', 'tenant_id'
    ];

    public function processos()
    {
        return $this->hasMany(Processo::class);
    }
}
