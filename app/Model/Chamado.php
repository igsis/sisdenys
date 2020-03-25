<?php

namespace App\Model;

use App\User;
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

    public function tipoChamado()
    {
        return $this->belongsTo(TipoChamado::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function usuario()
    {
        return $this->hasMany(User::class);
    }

    public function atendente()
    {
        return $this->belongsTo(Atendentes::class);
    }

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }

}
