<?php

namespace App\Model;

use App\Model\User;
use App\Model\TipoChamado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chamado extends Model
{
    use SoftDeletes;

    protected $table = 'chamados';
    protected $primaryKey = 'id';

    protected $fillable = [
        'protocolo',
        'titulo',
        'descricao',
        'telefone',
    ];

    public function tipochamado()
    {
        return $this->belongsTo(TipoChamado::class,'tipo_chamado_id','id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class,'status_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function atendentes()
    {
        return $this->belongsToMany(User::class,'atendentes','chamado_id','id');
    }

    public function nota()
    {
        return $this->hasMany(Nota::class,'chamado_id','id');
    }

}
