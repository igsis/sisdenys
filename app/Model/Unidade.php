<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{

    protected $table = 'unidades';

    public $timestamps = false;

    protected $fillable = [
        'unidade',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'instituicoes_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class,'unidade_id','id');
    }

    public function instituicao()
    {
        return $this->belongsTo(Unidade::class,'instituicoes_id','id');
    }
}
