<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus= Menu::latest()->simplePaginate(5);
        return view('dashboard.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.menus.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required','string',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgCategories', $filename, 'public');
            $request['image'] = '/storage/' . $path;
        } else {
            dd('Aucun fichier image reçu');
        }

        // creation du categorie
        $categories= Menu::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'image' => $path,
        ]);
        // dd($categories);
        return redirect()->route('dmenu.index', compact('categories'))->with('success', 'Menu crée avec success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   
        $menu= menu::findOrFail($id);
        $articles= Article::where('menu_id', $menu->id)->get();

        return view('home.plat', compact('menu','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu= menu::findOrFail($id);
        $articles= Article::where('menu_id', $menu->id)->get();

        return view('dashboard.menus.edit', compact('menu','articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu= menu::findOrFail($id);
        
        $request->validate([
            'nom' => 'required','string',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgCategories', $filename, 'public');
            $request['image'] = '/storage/' . $path;
        } else {
            dd('Aucun fichier image reçu');
        }

        // creation du categorie
        $menu->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'image' => $path,
        ]);
        // dd($categories);
        return redirect()->route('dmenu.index', compact('menu'))->with('success', 'Menu crée avec success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($menu)
    {
         $menu= Menu::findOrFail($menu);
        $menu->delete();
        return redirect()->back()->with('success', 'Article supprimé avec success');
    }
}
