<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
      'status'
    ];
    public function chamado()
    {
        return $this->belongsTo(Chamado::class);
    }
}