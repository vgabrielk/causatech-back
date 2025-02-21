<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'processo_id', 'data_audiencia', 'local', 'status',
    ];

    public function processo()
    {
        return $this->belongsTo(Processo::class);
    }
}
