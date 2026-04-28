<?php

namespace App\Http\Controllers\Inventaire;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Stock;
use Illuminate\Http\Request;

class MouvementStockController extends Controller
{
    public function index() {
        $mouvements= Stock::with('article')->latest()->paginate(10);
        $articles= Article::latest()->get();

        return view('dashboard.inventaire.stock', compact('mouvements','articles'));
    }


       public function stock(Request $request) {

        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'quantite' => 'required|integer|min:1',
            'type' => 'required',
        ]);

        $article = Article::findOrFail($request->article_id);

        Stock::create([
            'article_id' => $article->id,
            'type' => $request->type,
            'quantite' => $request->quantite,
            'reference' => 'MVT-' . now()->timestamp,
        ]);


        if($request->type == 'entree') {

            $article->increment('stock', $request->quantite);

            return back()->with('success', 'Entrée de stock enregistrée');
        } else {

            $article->decrement('stock', $request->quantite);

            return back()->with('success', 'Sortie de stock enregistrée');
        }
        
    }

}
