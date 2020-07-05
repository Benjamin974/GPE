<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SallesDeSportHasUsers extends Model
{
    protected $table = 'salles_de_sport_has_users';
    protected $fillable = ['id_salle_de_sport', 'id_user'];
    public $timestamps = false;
}
