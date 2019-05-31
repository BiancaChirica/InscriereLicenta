<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'studenti';

    public function profesor()
    {
        return $this->belongsTo('App\Profesor', 'id_prof');
    }

    public function comisie()
    {
        return $this->belongsTo('App\Comisie', 'id_comisie');
    }

    public function orar()
    {
        return $this->hasOne('App\Orar', 'id_student');
    }
}
