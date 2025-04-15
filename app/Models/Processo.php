<?php

// app/Models/Processo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 'assunto', 'data_inicio', 'data_fim', 'status', 'cliente_id', 'advogado_id', 'tenant_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function advogado()
    {
        return $this->belongsTo(Advogado::class);
    }

    public function partesEnvolvidas()
    {
        return $this->hasMany(ParteEnvolvida::class);
    }

    public function audiencias()
    {
        return $this->hasMany(Audiencia::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documentos::class);
    }

    public function historicoAndamento()
    {
        return $this->hasMany(HistoricoAndamento::class);
    }

    public function alertas()
    {
        return $this->hasMany(Alerta::class);
    }
}
