<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'image',
        'menu_id',
        'statut',
    ];

    public function menu()
        {
            return $this->belongsTo(menu::class);
        }

     // creation de slug a chaque article
        protected static function boot()
            {
                parent::boot();
            
                static::saving(function ($article) {
                    if (empty($article->slug)) {
                        $slug = Str::slug($article->nom);
                        $originalSlug = $slug;
            
                        // Vérifier l'unicité du slug
                        $count = 1;
                        while (Article::where('slug', $slug)->exists()) {
                            $slug = $originalSlug . '-' . $count;
                            $count++;
                        }
            
                        $article->slug = $slug;
                    }
                });
            }
}
