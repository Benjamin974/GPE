<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesModel extends Model
{
    protected $table = 'images';
    protected $fillable = ['id','lien'];
    public $timestamps = false;

    function programme(){
        return $this->belongsTo(ProgrammeModel::class,'id_image');
    }

}
