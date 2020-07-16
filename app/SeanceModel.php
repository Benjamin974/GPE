<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeanceModel extends Model
{
    protected $table = 'seances';
    protected $fillable = ['exercice', 'quantite_serie', 'temps_recuperation', 'nombre_jours'];
    public $timestamps = false;

    function programme()
    {
        return $this->hasMany(ProgrammeModel::class, 'id_seance');
    }
}
