<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orar extends Model
{
    protected $table = 'orar';

    public function comisie()
    {
        return $this->belongsTo('App\Comisie', 'id_comisie');
    }

    public function profesor()
    {
        return $this->belongsTo('App\Profesor', 'id_prof');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'id_student');
    }

}
