<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comisie extends Model
{
    protected $table = 'comisii';

    public function orare()
    {
        return $this->hasMany('App\Orar', 'id_comisie');
    }

    public function profesori()
    {
        return $this->hasMany('App\Profesor', 'id_comisie');
    }

    public function studenti()
    {
        return $this->hasMany('App\Student', 'id_comisie');
    }
}
