<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeanceModel extends Model
{
    protected $table = 'seances';
    protected $fillable = ['name', 'contenu_seance_par_jour', 'image'];
    public $timestamps = false;

    function programme()
    {
        return $this->hasMany(ProgrammeModel::class, 'id_seance');
    }
}
