<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'prenom', 'nom', 'photo_path','origine','fonction','email','adresse','code_postal','ville','pays','telephone_fixe','telephone_mobile','commentaire','user_id'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function user()
    {
        return $this->BelongsTo('App\User');
    }


//    public function entreprises($contact_id)
//    {
//        return $this
//            ->belongsToMany('App\Entreprise')->wherePivot('employee_id', $contact_id);
//
//    }

    public function dossiers()
    {
        return $this->morphToMany('App\Dossier', 'dossiers');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function entreprise()
    {
        return $this->BelongsToMany('App\Entreprise');
    }

}
