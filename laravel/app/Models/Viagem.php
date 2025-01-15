<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Viagem extends Model
{
    protected $table = 'viagens'; 

    protected $fillable = [
        'veiculo_id',
        'motorista_id',
        'km_inicial',
        'km_final'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    public function motoristas()
    {
        return $this->belongsToMany(Motorista::class, 'motorista_viagem');
    }
}
