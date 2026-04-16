<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Menu;
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
        
        // Determiner le prix)
        if($request->model == 3000) {
            $price= $articles->prix;
            $label= "Petit Model";
        } elseif($request->model == 4000) {
            $price= $articles->prix2;
             $label= "Moyen";
        } elseif($request->model == 5000) {
            $price= $articles->prix3;
             $label= "Grand Model";
        } else {
            $price= $articles->prix;
            $label= "Standart";
        }
        Cart::add([
            'id'=> $request->id,
            'name'=> $articles->nom,
            'qty'=> 1,
            'price'=> $price,
            'options'=> [
                'model'=> $label,
                'image'=> $articles->image,
                ]
            ])->associate('App\Models\Article');
        //dd($articles);

        return redirect()->route('panier.index')->with('success', 'Plat ajouté au panier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return back()->with('success', 'Le plat a été supprime');
    }

    public function delete()
    {
        Cart::destroy();
        return redirect()->route('home');
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
         $whatsapp = '221785470838';

         // message commande
         $message .= "Nom : {$request->nom}\n\n";
         $message .= "telephone : {$request->telephone}\n\n";
         $message .= "date : {$request->date}\n\n";
         $message .= "commande : {$request->commentaire}";

         

         $url = "https://wa.me/{$whatsapp}?text=" . urlencode($message);

         return redirect()->away($url);

    }

    

    public function whatsapp()
    {

        $cartItems = Cart::content();

        $message = "🛒 Bonjou ! Voici ma commande\n\n";

        foreach ($cartItems as $item) {

            //$lineTotal = $item->price * $item->qty;

            $message .= "🍽 {$item->name} ";
            $message .= "PU : " . number_format($item->price, 0, ',', ' ') . " FCFA - ";
            $message .= "Quantité : {$item->qty} ";
            //$message .= "Total : " . number_format($lineTotal, 0, ',', ' ') . " FCFA - ";

            if (!empty($articles->model->image)) {
                $message .= "Image : {$item->options->image} ";
            }

            $message .= " ";
            }

        // total du panier
        $total = Cart::subtotal(0, ',', ' ');

        $message .= "🥡 Montant total : {$total} FCFA";

        $phone = "221785470838"; // Remplacez par le numéro de téléphone du destinataire avec l'indicatif pays

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
