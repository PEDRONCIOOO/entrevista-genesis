<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'cnh_numero'
    ];

    public function viagens()
    {
        return $this->hasMany(Viagem::class);
    }
}
