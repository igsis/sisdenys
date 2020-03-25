<?php

namespace App\Model;

use App\Model\Atendentes;
use App\Model\Chamado;
use App\Model\Nota;
use App\Model\TipoAcesso;
use App\Model\Unidade;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'email', 'login', 'telefone'
    ];

    public function tipoAcesso(){
        return $this->hasMany(TipoAcesso::class);
    }

    public function unidade()
    {
        return $this->hasMany(Unidade::class);
    }

    public function chamados()
    {
        return $this->hasMany(Chamado::class,'user_id','id');
    }

    public function atendente()
    {
        return $this->belongsTo(Atendentes::class);
    }

    public function nota(){
        return $this->belongsTo(Nota::class);
    }
}
