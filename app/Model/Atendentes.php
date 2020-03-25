<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Atendentes extends Model
{
    protected $table = 'atendentes';


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function chamado()
    {
        return $this->belongsTo(Chamado::class,'chamado_id','id');
    }
}
