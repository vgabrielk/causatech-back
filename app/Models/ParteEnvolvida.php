<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParteEnvolvida extends Model
{
    use HasFactory;

    protected $fillable = [
        'processo_id', 'nome', 'tipo', 'tenant_id'
    ];

    public function processo()
    {
        return $this->belongsTo(Processo::class);
    }
}
