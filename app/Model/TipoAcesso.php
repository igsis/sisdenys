<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TipoAcesso extends Model
{
    protected $table = 'tipo_acessos';

    public function user()
    {
        return $this->hasMany(User::class,'tipo_acesso_id','id');
    }
}
