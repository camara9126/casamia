<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Paiements;
use App\Models\Recettes;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
      public function index(Request $request)
    {
        $recettes = Recettes::latest()->simplePaginate(10);

        $paiements = Paiements::where('statut', 'valide')->with('vente.client')->orderBy('created_at', 'desc')->get();

        return view('dashboard.finance.recettes', compact('recettes','paiements'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'montant' => 'required|numeric|min:0',
            'date_recette' => 'required|date',
            'mode_paiement' => 'required',
        ]);

        Recettes::create([
            'user_id' => $request->user()->id,
            'reference' => 'REC-' . now()->timestamp,
            'libelle' => $request->libelle,
            'description' => $request->description,
            'montant' => $request->montant,
            'date_recette' => $request->date_recette,
            'paiement_id' => $request->paiement_id,
            'mode_paiement' => $request->mode_paiement,
        ]);

        return back()->with('success', 'Recette enregistrée avec succès');
    }
}
