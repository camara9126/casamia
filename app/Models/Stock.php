<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'article_id',
        'type',
        'quantite',
        'reference',
    ];

    public function article()
    {
        return $this->belongsTo((Article::class));
    }
}
