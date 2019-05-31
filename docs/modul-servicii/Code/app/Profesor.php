<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'profesori';

    public function studenti()
    {
        return $this->hasMany('App\Student', 'id_prof');
    }

    public function comisie()
    {
        return $this->belongsTo('App\Comisie', 'id_comisie');
    }

    public function orare()
    {
        return $this->hasMany('App\Orar', 'id_prof');
    }
}
