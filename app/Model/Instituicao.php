<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicoes';

    protected $fillable = [
        'sigla',
        'instuicao'
    ];

    public $timestamps = false;

    public function unidade()
    {
        return $this->hasMany(Unidade::class,'instituicoes_id','id');
    }
}
