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

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
