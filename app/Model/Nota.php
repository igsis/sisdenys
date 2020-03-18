<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';

    protected $hidden = [
        'deleted_at'
    ];

    public function chamado()
    {
        return $this->hasMany(Chamado::class);
    }

    public function usuario()
    {
        return $this->hasMany(User::class);
    }
}
