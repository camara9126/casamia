<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Client;
use App\Models\Depenses;
use App\Models\Entreprise;
use App\Models\Paiements;
use App\Models\Recettes;
use App\Models\Stock;
use App\Models\Vente;
use App\Models\VenteItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ventesController extends Controller
{
    public function index(Request $request)
    {
        $user= request()->user();

        $ventes = Vente::with('client')->latest()->simplePaginate(10); 

       $today = now()->toDateString();

        $total = Vente::whereDate('created_at', $today)->sum('total');

        $depensesJour = Depenses::where('statut', 'payee')->whereDate('created_at', $today)->sum('montant');

        $totalEncaisse = ((Paiements::with('vente')->where('statut', 'valide')->whereDate('created_at', $today)->sum('montant')) - ($depensesJour));

        $totalReste = $totalEncaisse - $depensesJour;
        
        $ventesJour = Vente::whereDate('created_at', $today)->get();


        return view('dashboard.commercial.ventes', compact('ventes','ventesJour','total','totalEncaisse','totalReste','depensesJour','user'));
    }



    public function create(Request $request)
    {
        $clients = Client::latest()->get();
        $articles = Article::where('statut', true)->latest()->paginate(15);

        $article= $request->pdvSearch;

        return view('dashboard.commercial.ventesCreate', compact('clients', 'articles', 'article'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'articles' => 'required|array|min:1',
            'statut',
            'articles.*.article_id' => 'required',
            'articles.*.quantite' => 'required|numeric|min:1',
            'articles.*.prix' => 'required|numeric|min:0',
        ]);


            

            foreach ($request->articles as $item) {
    
                if (empty($item['article_id'])) {
                    continue;
                }

                $produit = Article::where('id', $item['article_id'])->lockForUpdate()->firstOrFail(); // verrou stock
            
                // Verification stock mouvement
                if ($produit->stock == 0) {

                    //return redirect()->back()->with('danger','Vous devez enregister un mouvement d"abord');
                }

                // Alert stock minimum depasse
                if ($produit->stock <= $produit->stock_min) {
                    //return redirect()->back()->with('danger','Votre stock minimum est depasse');
                }

                // Verification quantite de stock
                if ($produit->stock < $item['quantite']) {
                    
                    //return redirect()->back()->with('danger','Stock insuffisant pour cette article ');
                }


                //dd($request->montant);
                $vente = Vente::create([
                    'client_id' => $request->client_id,
                    'reference' => 'VNT-' . time(),
                    'date' => now(),
                    'total' => 0,
                    'total_tva' => 0,
                    'total_ttc' => 0,
                    'statut' => 'impayee',
                    'user_id' => $request->user()->id,
                ]);

                $total = 0;
                $total_tva = 0;
                $total_ttc = 0;

                // Creation vente item     
                VenteItem::create([
                    'vente_id' => $vente->id,
                    'article_id' => $item['article_id'],
                    'quantite' => $item['quantite'],
                    'prix_unitaire' => $item['prix'],
                    'taux_tva' => 0,
                    'montant_tva' => ($item['quantite'] * $item['prix']) * (0 /100 ),
                    'total_ttc' => ($item['quantite'] * $item['prix']) + (($item['quantite'] * $item['prix']) * (0 /100 )),
                    'total' => $item['quantite'] * $item['prix'],
                ]);

                // Mise a jour stock
                $produit->decrement('stock', $item['quantite']);

                // Enregistrememt historique stock
                Stock::create([
                    'article_id' => $produit->id,
                    'type' => 'sortie',
                    'quantite' => $item['quantite'],
                    'reference' => 'MVT-' . now()->timestamp,
                ]);

                // Calcule total + total_tva + total_ttc
                $total += $item['quantite'] *  $item['prix'];
                $total_tva += ($item['quantite'] * $item['prix']) * (0 /100 );
                $total_ttc += ($item['quantite'] * $item['prix']) + (($item['quantite'] * $item['prix']) * (0 /100 ));
                
                // Mise a jour total + total_tva + total_ttc
                $vente->update([
                    'total' => $total,
                    'total_tva' => $total_tva,
                    'total_ttc' => $total_ttc,
                ]);
                
            } 

            //enregistrement du paiement automatique
            $paiement= Paiements::create([
                'vente_id' => $vente->id,
                'montant' => $vente->total_ttc,
                'mode_paiement' => 'cash',
                'date_paiement' => now(),
                'reference' => 'PAY-' . time(),
                'statut' => 'valide',
                'user_id' => request()->user()->id,
            ]);


            // Mise à jour du statut de la vente

            $totalPaye = $vente->paiements()->where('statut','valide')->sum('montant');
//dd( $vente->paiements());
            $vente->statut =  $totalPaye == 0 ? 'impayee' : ($totalPaye < $vente->total_ttc ? 'partielle' : 'payee');

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

        
            return redirect()->route('ventes.index')->with('success', 'Vente effectuée avec succès');
    }


    public function show($id)
    {

        $entreprise= Entreprise::findOrFail(1);
        $vente= Vente::with('client', 'items', 'paiements')->findOrFail($id);
//dd($vente);
        $vente->load(['client', 'items', 'paiements']);

        $pdf = Pdf::loadView('dashboard.inventaire.facture', compact('vente', 'entreprise'));

        return $pdf->stream('Facture-' . $vente->reference . '.pdf');
    }

    public function destroy(string $id)
    {
        $vente= Vente::findOrFail($id);
        $paiement= Paiements::where('vente_id', $vente->id)->get();
        //dd($paiement);
         $vente->destroy($id);
        return redirect()->route('ventes.index')->with('success', ' vente supprimé avec succès');        

    }
  
}
    
