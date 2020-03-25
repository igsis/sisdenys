<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TipoAcesso extends Model
{
    protected $table = 'tipo_acessos';

    protected $fillable = [
        'id',
        'tipo_acesso'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
