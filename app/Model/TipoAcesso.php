<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TipoAcesso extends Model
{
    protected $table = 'tipo_acessos';

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
