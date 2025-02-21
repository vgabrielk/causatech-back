<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contract_number',
        'start_date',
        'end_date',
        'value',
        'details',
    ];
    protected $casts = [
        'details' => 'array',
    ];

    /**
     * Relação: Um contrato pertence a um usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
