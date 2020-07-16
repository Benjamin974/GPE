<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgrammeModel extends Model
{
    protected $table = 'programmes';
    protected $fillable = ['id_user', 'id_salle_de_sport', 'id_seance', 'name', 'difficulte', 'nbre_seance_semaine', 'id_image'];
    public $timestamps = false;
    use SoftDeletes;

    function coach()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    function salleDeSport()
    {
        return $this->belongsTo(SalleDeSportModel::class, 'id_salle_de_sport');
    }

    function seance()
    {
        return $this->belongsTo(SeanceModel::class, 'id_seance');
    }

    function image()
    {
        return $this->belongsTo(ImagesModel::class, 'id_image');
    }

    function client()
    {
        return $this->belongsToMany('App\User', 'client_has_programme', 'id_client', 'id_programme');
    }
}
