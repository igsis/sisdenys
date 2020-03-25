<?php

namespace App;

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
        'nome',
        'email',
        'login',
        'telefone',
        'unidade_id',
        'tipo_acesso_id'
    ];

    public function tipoacesso(){
        return $this->belongsTo(TipoAcesso::class,'tipo_acesso_id','id');
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class,'unidade_id','id');
    }

    public function chamado()
    {
        return $this->hasMany(Chamado::class,'user_id','id');
    }

    public function atendentes()
    {
        return $this->hasOne(Atendentes::class,'user_id','id');
    }

    public function nota(){
        return $this->hasMany(Nota::class,'user_id','id');
    }
}
