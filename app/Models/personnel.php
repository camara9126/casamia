<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class personnel extends Authenticatable
{

    protected $table ='personnels';

     protected $fillable = [
        'prenom',
        'pnom',
        'identifiant',
        'motdepasse',
        'statut',
        'email',
    ];
    protected $hidden = [
        'motdepasse',
    ];

    public function getAuthPassword()
    {
        return $this->motdepasse;
    }
}

