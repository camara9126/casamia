<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Paiements;
use App\Models\Recettes;
use App\Models\Vente;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
     public function index(Request $request)
    {
        $paiements = Paiements::with('vente.client')->latest()->simplePaginate(10); 

        return view('dashboard.finance.paiements', compact('paiements'));
    }


       public function store(Request $request)
    {
        $request->validate([
            'vente_id' => 'required|exists:ventes,id',
            'montant' => 'required|numeric|min:1',
            'mode_paiement' => 'required',
            'date_paiement' => 'required'
        ]);
        //dd($request);

        $vente = Vente::findOrFail($request->vente_id);
        
        $totalPaye = $vente->paiements()->where('statut','valide')->sum('montant');
        $reste = $vente->total_ttc - $totalPaye;

        if ($request->montant > $reste) {
            return back()->withErrors([
                'montant' => 'Le montant dépasse le reste à payer.'
            ]);
        }


        $paiement= Paiements::create([
            'vente_id' => $vente->id,
            'montant' => $request->montant,
            'mode_paiement' => $request->mode_paiement,
            'date_paiement' => $request->date_paiement,
            'reference' => 'PAY-' . time(),
            'user_id' => request()->user()->id,

        ]);


        // Mise à jour du statut de la vente
        $vente = $paiement->vente;

        $totalPaye = $vente->paiements()->where('statut','valide')->sum('montant');

        $vente->statut = $totalPaye == 0 ? 'impayee' : ($totalPaye < $vente->total_ttc ? 'partielle' : 'payee');

        $vente->save();

        // 2. Création automatique de la recette
        Recettes::create([
            'user_id' => $request->user()->id,
            'paiement_id' => $paiement->id,
            'reference' => 'REC-' . now()->timestamp,
            'libelle' => 'Paiement vente ' . $paiement->vente->reference,
            'montant' => $paiement->montant,
            'date_recette' => now(),
            'mode_paiement' => 'cash',
            'statut' => 'recu',
        ]);


        return back()->with('success', 'Paiement enregistré avec succès');
    }


    // Anuuler paiement daja valide
    public function annuler(Request $request, $id)
    {

        $paiement = Paiements::findOrFail($id);
        

        $paiement->update([
            'statut' => 'annule',
            'motif' => $request->motif ?? 'Annulation manuelle',
            'annule_par' => $request->user()->id,
            'annule_le' => now(),
        ]);


        if($paiement->recette) {
            $paiement->recette->update(['statut' => 'annule']);
        }
      
       

        $vente = $paiement->vente;

        // Recalcul statut vente
        $totalPaye = $vente->paiements()->where('statut', 'valide')->sum('montant');

        $vente->statut = $totalPaye == 0 ? 'impayee' : ($totalPaye < $vente->total_ttc ? 'partielle' : 'payee');

        $vente->save();

        return back()->with('success', 'Paiement annulé avec succès');
    }
}
