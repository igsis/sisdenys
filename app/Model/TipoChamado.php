<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoChamado extends Model
{
    protected $table = 'tipo_chamados';

    protected $fillable = [
        'tipo_chamado'
    ];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class);
    }   
}
