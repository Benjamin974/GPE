<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'id_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function role(){
        return $this->belongsTo(RoleModel::class,'id_role');
    }

    function gerant()
    {
        return $this->hasMany(SalleDeSportModel::class, 'id_user');
    }

    function coach()
    {
        return $this->hasMany(ProgrammeModel::class, 'id_user');
    }

    public function programme()
    {
        return $this->belongsToMany('App\ProgrammeModel', 'client_has_programme', 'id_client', 'id_programme');
    }

    public function salleDeSport()
    {
        return $this->belongsToMany('App\SalleDeSportModel', 'salles_de_sport_has_users', 'id_salle_de_sport', 'id_user');
    }
}
