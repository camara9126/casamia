<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $fillable = [
        'client_id',
        'reference',
        'total',
        'date_devis',
        'date_expiration',
        'note',
        'statut',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function details()
    {
        return $this->hasMany(DevisDetails::class);
    }
}
