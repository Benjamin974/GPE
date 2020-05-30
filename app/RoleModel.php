<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $fillable = ['id', 'name'];
    public $timestamps = false;

    function user()
    {
        return $this->hasMany(User::class, 'id_role');
    }
}
