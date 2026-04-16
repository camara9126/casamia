<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles= Article::latest()->simplePaginate(5);
        $menus= Menu::all();

        return view('dashboard.articles.index', compact('articles','menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu= Menu::all();
        return view('dashboard.articles.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required','string',
            'description' => 'required',
            'prix' => 'required',
            'prix2' => 'nullable',
            'prix3' => 'nullable',
            'menu_id' => 'required', 'exists:menus,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
       
        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgArticles', $filename, 'public');
            $request['image'] = '/storage/' . $path;
        } else {
            dd('Aucun fichier image reçu');
        }
        
        // creation de l'article
        $articles= Article::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'prix2' => $request->prix2 ?? null,
            'prix3' => $request->prix3 ?? null,
            'menu_id' => $request->menu_id,
            'image' => $path,
        ]);

         //dd($articles);
        return redirect()->route('darticle.index', compact('articles'))->with('success', 'Plat crée avec success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $articles= Article::FindOrFail($id);
        $menus= Menu::where('id', $articles->menu_id)->get();
        
        return view('home.detail', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles= Article::FindOrFail($id);
        $menu= Menu::all();
        //dd($articles);
        return view('dashboard.articles.edit', compact('articles','menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $articles= Article::FindOrFail($id);

        $request->validate([
            'nom' => 'required','string',
            'description' => 'required',
            'prix' => 'required',
            'prix2' => 'nullable',
            'prix3' => 'nullable',
            'menu_id' => 'required', 'exists:menus,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
       
        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgArticles', $filename, 'public');
            $valitData['image'] = '/storage/' . $path;
        } else {
            dd('Aucun fichier image reçu');
        }
        
        // modification de l'article
        $articles->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'prix2' => $request->prix2 ?? null,
            'prix3' => $request->prix3 ?? null,
            'menu_id' => $request->menu_id,
            'image' => $path,
        ]);
            
             //dd($articles);
            return redirect()->route('darticle.index', compact('articles'))->with('success', 'Plat modifie avec success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($article)
    {
         $article= Article::findOrFail($article);
        $article->delete();
        return redirect()->back()->with('success', 'Article supprimé avec success');
    }

    /**
     * activer un article 
     */  
    public function activate(article $article)
    {
        $article->update(['statut' => true]);
        return redirect()->back()->with('success', 'Article desactivé avec succès.');
    }
    /**
     * desactiver un article
     */
    public function desactivate(article $article)
    {
        $article->update(['statut' => false]);
        return redirect()->back()->with('success', 'Article activé avec succès.');
    }
}
