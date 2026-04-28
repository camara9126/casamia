<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Menu;
use App\Models\Paiements;
use App\Models\Stock;
use App\Models\Vente;
use App\Models\VenteItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Switch_;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $menus= Menu::all();
        $cart= Cart::content();
        //dd($cart);

            return view('home.panier', compact('cart','menus'));
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
       
        $dupplicate= Cart::search(function ($cartItem, $rowId) use ($request) {
	        return $cartItem->id === $request->id;
        });

        if($dupplicate->isNotEmpty()) {
            return redirect()->back()->with('success', 'Le plat a déja été ajoute');
        }

        $articles= Article::findOrFail($request->id);
        
        
        Cart::add([
            'id'=> $request->id,
            'name'=> $articles->nom,
            'qty'=> 1,
            'price'=> $articles->prix,
            'options'=> [
                'model'=> $articles->menu_id,
                'image'=> $articles->image,
                ]
            ])->associate('App\Models\Article');
        //dd($articles);

        return redirect()->back()->with('success', 'Plat ajouté au panier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return back()->with('success', 'Le plat a été supprime');
    }


    // Commande en ligne
    public function commande(Request $request)
    {
        $message = "🛒Commande speciale\n\n ";
         $request->validate([
            'nom' => 'required|string',
            'telephone' => 'required|string|max:20',
            'date' => 'required',
            'commentaire' => 'required|string',
         ]);

         //dd($request);
         // Numero whatsapp
         $whatsapp = '221772068181';

         // message commande
         $message .= "Nom : {$request->nom}\n\n";
         $message .= "telephone : {$request->telephone}\n\n";
         $message .= "date : {$request->date}\n\n";
         $message .= "commande : {$request->commentaire}";

         

         $url = "https://wa.me/{$whatsapp}?text=" . urlencode($message);

         return redirect()->away($url);

    }

    
    //Commande article sur panier
    public function whatsapp()
    {
        $cartItems = Cart::content();
        
        // Vérifier si le panier n'est pas vide
        if($cartItems->isEmpty()) {
            return back()->with('error', 'Votre panier est vide');
        }
        
        $message = "🛒 Bonjou ! Voici ma commande\n\n";
        
        // 1. CRÉER UNE SEULE VENTE pour tous les articles
        $vente = Vente::create([
            'client_id' => 2,
            'reference' => 'VNT-' . time(),
            'date' => now(),
            'total' => 0,
            'total_tva' => 0,
            'total_ttc' => 0,
            'statut' => 'impayee',
            'user_id' => 1,
        ]);
        
        $totalGeneral = 0;
        $totalTvaGeneral = 0;
        $totalTtcGeneral = 0;
        
        // 2. PARCOURIR les articles du panier
        foreach ($cartItems as $item) {
            
            // Construction du message WhatsApp
            $message .= "📦 Produit: {$item->name}\n";
            $message .= "   Prix unitaire: " . number_format($item->price, 0, ',', ' ') . " FCFA\n";
            $message .= "   Quantité: {$item->qty}\n";
            $lineTotal = $item->qty * $item->price;
            $message .= "   Total ligne: " . number_format($lineTotal, 0, ',', ' ') . " FCFA\n\n";
            
            // 3. CRÉER LES ITEMS DE VENTE pour cette vente
            VenteItem::create([
                'vente_id' => $vente->id,
                'article_id' => $item->id,
                'quantite' => $item->qty,
                'prix_unitaire' => $item->price,
                'taux_tva' => 0,
                'montant_tva' => 0, // (0% de TVA)
                'total_ttc' => $lineTotal,
                'total' => $lineTotal,
            ]);
            
            // 4. MISE À JOUR STOCK
            $produit = Article::where('id', $item->id)->lockForUpdate()->firstOrFail();
            $produit->decrement('stock', $item->qty);
            
            // 5. HISTORIQUE STOCK
            Stock::create([
                'article_id' => $produit->id,
                'type' => 'sortie',
                'quantite' => $item->qty,
                'reference' => 'MVT-' . now()->timestamp . '-' . $vente->id,
            ]);
            
            // 6. CUMUL DES TOTAUX
            $totalGeneral += $lineTotal;
            $totalTvaGeneral += 0; // TVA à 0%
            $totalTtcGeneral += $lineTotal;
        }
        
        // 7. MISE À JOUR DES TOTAUX DE LA VENTE
        $vente->update([
            'total' => $totalGeneral,
            'total_tva' => $totalTvaGeneral,
            'total_ttc' => $totalTtcGeneral,
        ]);
        
        // Ajout du total général dans le message
        $message .= "🥡 Montant total : " . number_format($totalTtcGeneral, 0, ',', ' ') . " FCFA\n";
        $message .= "🙏 Merci pour votre commande !";
        
        $phone = "221772068181";
        
        // Vider le panier après validation de la commande
        Cart::destroy();
        
        return redirect()->away("https://wa.me/{$phone}?text=" . urlencode($message));
    }

    /**
     * Ajout de quantite du plat commander.
     */
    public function plus($rowId)
    { 
        $articles= Cart::get($rowId);
       
        Cart::update($rowId, $articles->qty + 1);

        return back()->with('success', 'Le plat a été mise a jour');;
    }

    /**
     * Ajout de quantite du plat commander.
     */
    public function moins($rowId)
    {
        $articles= Cart::get($rowId);

        if($articles->qty > 1) {
             Cart::update($rowId, $articles->qty - 1);
        }
       
        return back()->with('success', 'Le plat a été mise a jour');;
    }
}
