<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;

    protected $fillable = [
        'processo_id', 'titulo', 'mensagem', 'data_alerta',
    ];

    public function processo()
    {
        return $this->belongsTo(Processo::class);
    }
}
