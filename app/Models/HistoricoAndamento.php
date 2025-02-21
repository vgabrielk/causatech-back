<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoAndamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'processo_id', 'descricao', 'data',
    ];

    public function processo()
    {
        return $this->belongsTo(Processo::class);
    }
}
