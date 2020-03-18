<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Atendentes extends Model
{
    protected $table = 'atendentes';


    public function usuario()
    {
        return $this->hasMany(User::class);
    }

    public function chamado()
    {
        return $this->hasMany(Chamado::class);
    }
}
