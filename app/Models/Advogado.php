<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToTenant;

class Advogado extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = [
        'nome', 'oab', 'estado_oab', 'email', 'telefone', 'endereco','tenant_id'
    ];

    public function processos()
    {
        return $this->hasMany(Processo::class);
    }
}
