<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $fillable = [
      'status'
    ];

    public $timestamps = false;

    public function chamado()
    {
        return $this->hasMany(Chamado::class);
    }
}
