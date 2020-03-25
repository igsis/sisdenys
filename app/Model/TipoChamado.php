<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoChamado extends Model
{
    protected $table = 'tipo_chamados';

    public $timestamps = false;

    protected $fillable = [
        'tipo_chamado'
    ];

    public function chamado()
    {
        return $this->hasMany(Chamado::class,'tipo_chamado_id','id');
    }
}
