<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalleDeSportModel extends Model
{
    protected $table = 'salles_de_sport';
    protected $fillable = ['name','lieu', 'horaire', 'id_user'];
    public $timestamps = false;

    function gerant(){
        return $this->belongsTo(User::class,'id_user');
    }

    function programme()
    {
        return $this->hasMany(ProgrammeModel::class, 'id_salle_de_sport');
    }

    public function client()
    {
        return $this->belongsToMany('App\User', 'salles_de_sport_has_users', 'id_salle_de_sport', 'id_user');
    }
}
