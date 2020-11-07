<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'description', 'commentaire','dateEnd','dateStart','commentaire','categorie','sous-categorie','mode_contact'
    ];

    protected $hidden = [
        'remember_token'
    ];


    public function dossiers()
    {

        return $this->belongsTo('App\Dossier');

    }

}
