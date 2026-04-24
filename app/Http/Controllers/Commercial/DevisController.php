<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Client;
use App\Models\Devis;
use App\Models\DevisDetails;
use App\Models\Vente;
use App\Models\VenteItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DevisController extends Controller
{
     /**
     * Liste des devis
     */
    public function index()
    {
        $devis = Devis::with('client')->latest()->paginate(10);

        return view('dashboard.commercial.devis', compact('devis'));
    }


    public function search(Request $request)
    {
        $search = $request->query('search');

        $devis = Devis::with('client')->when($search, function ($query, $search) {

                $query->where('reference', 'like', "%{$search}%")->orWhereHas('client', function ($q) use ($search) {

                        $q->where('nom', 'like', "%{$search}%");
                });

        })->latest()->paginate(10)->withQueryString(); // 🔑 garde ?search=;

        return view('dashboard.commercial.devis', compact('devis','search'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $clients = Client::all();
        $articles = Article::all();

        return view('dashboard.commercial.devisCreate', compact('clients', 'articles'));
    }

    /**
     * Enregistrer un devis
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'articles' => 'required|array',
            'articles.*.article_id' => 'required',
            'articles.*.quantite' => 'required|numeric|min:1',
            'articles.*.prix' => 'required|numeric|min:0',
        ]);

        // Création du devis
        $devis = Devis::create([
            'reference' => 'DEV-' . strtoupper(Str::random(6)),
            'client_id' => $request->client_id,
            'total' => 0,
            'statut' => 'en_attente',
            'entreprise_id' => 1,
            'date_devis' => now(),
            'date_expiration' => now()->addDays(7),
        ]);

        $total = 0;

        // Enregistrement des produits
        foreach ($request->articles as $item) {

            $ligneTotal = $item['quantite'] * $item['prix'];

            DevisDetails::create([
                'devis_id' => $devis->id,
                'article_id' => $item['article_id'],
                'quantite' => $item['quantite'],
                'prix_unitaire' => $item['prix'],
                'total' => $ligneTotal,
            ]);

            $total += $ligneTotal;
        }

        // Mise à jour du total
        $devis->update([
            'total' => $total
        ]);

        return redirect()->route('devis.index')->with('success', 'Devis créé avec succès');
    }

    /**
     * Afficher un devis
     */
    public function show($id)
    {
        $articles= Article::latest()->get();

        $devis = Devis::with('client', 'details')->findOrFail($id);
//dd($devis);
        return view('dashboard.commercial.devisShow', compact('devis','articles'));
    }

    /**
     * Formulaire d'edit
     */
    public function edit(string $id)
    {
        $devis= Devis::with('client', 'details')->findOrFail($id);
//dd($devis);
        $clients = Client::all();
        $articles = Article::all();

        return view('dashboard.commande.devisEdit', compact('devis', 'clients', 'articles'));
    }

    /**
     * Enregistrer un devis
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'client_id' => 'required',
            'articles' => 'required|array',
            'articles.*.article_id' => 'required',
            'articles.*.quantite' => 'required|numeric|min:1',
            'articles.*.prix' => 'required|numeric|min:0',
        ]);

        $devis= Devis::with('client', 'details')->findOrFail($id);

        // Suppressionm des anciens details devis
        $devis->details()->delete();

        $total = 0;
//dd($devis);

        // Recreer les nouveaux details
        foreach ($request->articles as $item) {

            $ligneTotal = $item['quantite'] * $item['prix'];

            DevisDetails::create([
                'devis_id' => $devis->id,
                'article_id' => $item['article_id'],
                'quantite' => $item['quantite'],
                'prix_unitaire' => $item['prix'],
                'total' => $ligneTotal,
            ]);

            $total += $ligneTotal;
        }

        // Mise à jour du total
        $devis->update([
            'client_id' => $request->client_id,
            'total' => $total,
            'date_devis' => now()
        ]);

        return redirect()->route('devis.index')->with('success', 'Devis modifié avec succès');
    }

    /**
     * Supprimer un devis
     */
    public function destroy($id)
    {
        $devis = Devis::findOrFail($id);
        $devis->delete();

        return redirect()->route('devis.index')->with('success', 'Devis supprimé');
    }

    /**
     * Valider un devis
     */
    public function valider($id)
    {
        $devis = Devis::findOrFail($id);

        $devis->update([
            'statut' => 'valide'
        ]);

        return redirect()->route('devis.index')->with('success', 'Devis validé');
    }

    /**
     * Refuser un devis
     */
    public function refuser($id)
    {
        $devis = Devis::findOrFail($id);

        $devis->update([
            'statut' => 'refuse'
        ]);

        return redirect()->route('devis.index')->with('success', 'Devis refusé');
    }

    /**
     * Convertir devis en vente
     */
    public function convertir(Request $request, $id)
    {
        $devis = Devis::with('client', 'details')->findOrFail($id);

        // Créer la vente
        $vente = Vente::create([
            'reference' => 'VNT-' . time(),
            'date' => now(),
            'client_id' => $devis->client_id,
            'total' => $devis->total,
            'total_tva' => 0,
            'total_ttc' => 0,
            'statut' => 'impayee',
            'user_id' => $request->user()->id,
        ]);

            $total = 0;
            $total_tva = 0;
            $total_ttc = 0;

        // Ajouter les produits
        foreach ($devis->details as $detail) {


            VenteItem::create([
                'vente_id' => $vente->id,
                'article_id' => $detail->article_id,
                'quantite' => $detail->quantite,
                'prix_unitaire' => $detail->prix_unitaire,
                'taux_tva' => 0,
                'montant_tva' => ($detail['quantite'] * $detail['prix_unitaire']) * (0 /100 ),
                'total_ttc' => ($detail['quantite'] * $detail['prix_unitaire']) + (($detail['quantite'] * $detail['prix_unitaire']) * (0 /100 )),
                'total' => $detail['quantite'] * $detail['prix_unitaire'],
            ]);

             // Calcule total + total_tva + total_ttc
            $total += $detail['quantite'] *  $detail['prix_unitaire'];
            $total_tva += ($detail['quantite'] * $detail['prix_unitaire']) * (0 /100 );
            $total_ttc += ($detail['quantite'] * $detail['prix_unitaire']) + (($detail['quantite'] * $detail['prix_unitaire']) * (0 /100 ));

             // Mise a jour total + total_tva + total_ttc
            $vente->update([
                'total' => $total,
                'total_tva' => $total_tva,
                'total_ttc' => $total_ttc,
            ]);
            
        }

        return redirect()->route('commandes.index', $vente->id)->with('success', 'Devis converti en vente');
    }


    // Facture
    public function facture($id)
    {

        $articles= Article::latest()->get();

        $devis = Devis::with('client', 'details')->findOrFail($id);

        $devis->load(['client', 'details']);
//dd($devis);
        $pdf = Pdf::loadView('dashboard.devis.facture', compact('devis'));

        return $pdf->stream ('Facture-' . $devis->reference . '.pdf');
    }
}
