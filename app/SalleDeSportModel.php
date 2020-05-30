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
}
