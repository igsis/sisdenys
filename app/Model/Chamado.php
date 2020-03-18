<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $table = 'chamados';

    protected $fillable = [
        'protocolo',
        'titulo',
        'descricao',
        'telefone',
    ];

    public function tipoChamado()
    {
        return $this->hasMany(TipoChamado::class);
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }

    public function usuario()
    {
        return $this->hasMany(User::class);
    }

    public function atendente()
    {
        return $this->belongsTo(Atendentes::class);
    }

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

}
