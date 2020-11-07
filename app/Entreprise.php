<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'raison_social', 'adresse1', 'adresse2','code_postal','ville','pays','telephone_fixe','email','website'
    ];

    protected $hidden = [
        'remember_token'
    ];

//    public function contacts()
//    {
//        return $this
//            ->belongsToMany('App\Contact')
//            ->withTimestamps();
//
//    }

    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    public function dossiers()
    {
        return $this->morphMany('App\Dossier', 'dossiers');
    }


    public function contact()
    {
        return $this
            ->belongsToMany('App\Contact');

    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

//    public function jobs()
//    {
//        return $this
//            ->hasMany('App\Job');
//    }

}
