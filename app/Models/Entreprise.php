<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        'nom',
        'telephone',
        'adresse',
        'logo',
        'taux_tva',
        'ninea',
    ];
}
