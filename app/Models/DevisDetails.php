<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevisDetails extends Model
{
    protected $fillable = [
        'devis_id',
        'article_id',
        'quantite',
        'prix_unitaire',
        'total',
    ];

     public function devis()
    {
        return $this->hasMany(Devis::class);
    }

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
