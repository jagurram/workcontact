<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'fonction', 'email', 'telephone_fixe','telephone_mobile','commentaire','entreprise_id','contact_id','dateDebut','dateFin'
    ];


    protected $hidden = [
        'remember_token'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    public function entreprise()
    {
        return $this->belongsTo('App\Entreprise');
    }

}
