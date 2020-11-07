<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'titre', 'commentaire', 'isClosed'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function contacts()
    {

        return $this->morphTo('App\Contact', 'dossiers');

    }

    public function entreprises()
    {

        return $this->morphTo('App\Entreprise', 'dossiers');

    }


    public function activites()
    {
        return $this->hasMany('App\Activite');
    }
}
