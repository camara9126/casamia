<?php

namespace App\Http\Controllers;

use App\Models\Evenements;
use Illuminate\Http\Request;

class EvenementsControoler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements= Evenements::latest()->paginate();
        return view('dashboard.evenements.index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'titre' => 'required','string',
            'description' => 'required',
            'date' => 'required',
            'heure' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
   
        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgEvenements', $filename, 'public');
            $request['image'] = '/storage/' . $path;
        }
        
        // creation de l'article
        $evenements= Evenements::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'date' => $request->date,
            'heure' => $request->heure,
            'image' => $path,
        ]);

         //dd($articles);
        return redirect()->route('evenements.index', compact('evenements'))->with('success', 'Evenement crée avec success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $evenements= Evenements::FindOrFail($id);

        $request->validate([
            'titre' => 'required','string',
            'description' => 'required',
            'date' => 'required',
            'heure' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
       
        // Gestion des l'images
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgEvenemts', $filename, 'public');
            $valitData['image'] = '/storage/' . $path;
        } 
        
        // modification de l'article
        $evenements->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'date' => $request->date,
            'heure' => $request->heure,
            'image' => $path ?? $evenements->image,
        ]);
            
             //dd($articles);
            return redirect()->route('evenements.index', compact('evenements'))->with('success', 'Evenement modifie avec success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evenements= Evenements::findOrFail($id);
        $evenements->delete();

        return redirect()->back()->with('success', 'Evenement supprimé avec success');
    }

    public function reserve()
    {
        return redirect()->back()->with('success', 'Fonctionnalite en cours de construction');
    }
}
