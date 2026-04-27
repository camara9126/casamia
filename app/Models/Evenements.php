<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenements extends Model
{
    
    protected $fillable = [
        'titre',
        'description',
        'date',
        'image',
        'heure',
        'statut',
    ];
}
