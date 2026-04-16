<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'image',
    ];

     public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
