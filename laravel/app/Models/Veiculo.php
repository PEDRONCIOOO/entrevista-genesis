<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'modelo',
        'ano',
        'data_aquisicao',
        'km_aquisicao',
        'renavam',
        'placa'
    ];

    public function viagens()
    {
        return $this->hasMany(Viagem::class);
    }
}
