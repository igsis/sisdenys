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

    public $timestamps = false;

    public function chamado()
    {
        return $this->belongsTo(Chamado::class,'chamado_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
