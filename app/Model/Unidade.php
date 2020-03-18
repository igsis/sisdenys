<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{

    protected $table = 'unidades';

    protected $fillable = [
        'unidade',
        'cep',
        'endereco',
        'numero',
        'bairro',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function instituicao()
    {
        return $this->hasMany(Unidade::class);
    }
}
