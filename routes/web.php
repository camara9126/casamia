<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\Commercial\ClientController;
use App\Http\Controllers\Commercial\DevisController;
use App\Http\Controllers\EvenementsControoler;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\Evenements;
use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;


// page d'accueil
Route::get('/', function () {
    $menus= Menu::latest()->get();
    $articles= Article::latest()->paginate(6);
    $evenements= Evenements::latest()->paginate(3);

    return view('home.index', compact('menus','articles','evenements'));
})->name('accueil');

// a propos
Route::get('/plat', function () {
   // $categorie= Categorie::all();
    $menus= Menu::all();
    $plats= Article::latest()->paginate(10);
    return view('home.plat', compact('menus','plats'));
})->name('plat');

// a propos
Route::get('/apropos', function () {
   // $categorie= Categorie::all();
    return view('home.apropos');
})->name('apropos');


// contact
Route::get('/contact', function () {
   // $categorie= Categorie::all();
    return view('home.contact');
})->name('contact');

//menu
Route::get('/menu', function () {
   $menus= Menu::latest()->get();
    $plats= Article::latest()->paginate(10);

    return view('home.menu', compact('menus','plats'));
})->name('menu');


//Route connexion
Route::resource('/login', UserController::class);

//Route deconnexion
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//Route panier
Route::resource('/panier',CardController::class);
//Route::post('/ajout/panier', [CardController::class, 'store'])->name('panier.store');
//Route::delete('/ajout/{rowId}', [CardController::class, 'destroy'])->name('panier.destroy');
Route::delete('/ajout/{rowId}', [CardController::class, 'delete'])->name('delete');

// Route mise a jour commande panier
Route::get('/panier/plus/{rowId}', [CardController::class, 'plus'])->name('panier.plus');
Route::get('/panier/moins/{rowId}', [CardController::class, 'moins'])->name('panier.moins');

//Route personnel
Route::resource('/personnel', PersonnelController::class);


//Dashboard
Route::get('/dhome', function () {
    $menus= Menu::latest()->get();
    $articles= Article::latest()->get();

    return view('casa.index', compact('menus','articles'));

})->middleware(['auth','verified'])->name('dhome');

//Menu
Route::resource('/dmenu', MenuController::class)->middleware(['auth','verified']);
Route::get('/menu/{id}',[MenuController::class, 'show'])->name('menu.show');


//Article
Route::resource('/darticle', ArticleController::class)->middleware(['auth','verified']);


// Route Commercial - Inventaire - Finanace
Route::get('/commercial', function () {
    $menus= Menu::latest()->get();
    $articles= Article::latest()->get();
    return view('dashboard.commercial.index', compact('menus','articles'));

})->middleware(['auth','verified'])->name('commercial');


Route::get('/inventaire', function () {
    $menus= Menu::latest()->get();
    $articles= Article::latest()->get();

    return view('dashboard.inventaire.index', compact('menus','articles'));

})->middleware(['auth','verified'])->name('inventaire');


Route::get('/finance', function () {
    $menus= Menu::latest()->get();
    $articles= Article::latest()->get();

    return view('dashboard.finance.index', compact('menus','articles'));

})->middleware(['auth','verified'])->name('finance');


// Routes Commercial
Route::resource('/clients', ClientController::class)->middleware(['auth','verified']);
Route::resource('/devis', DevisController::class)->middleware(['auth','verified']);
    Route::get('/vailde/{devis}/valider', [DevisController::class, 'valider'])->name('dValider');
    Route::get('/refuse/{devis}/refuser', [DevisController::class, 'refuser'])->name('dRefuser');
    Route::get('/convert/{devis}/convertir', [DevisController::class, 'convertir'])->name('dConvertir');
//Route::resource('/darticle', ArticleController::class)->middleware(['auth','verified']);

// Route Evenements
Route::resource('/evenements', EvenementsControoler::class)->middleware(['auth','verified']);
//Route whatsapp
Route::get('/whatsapp', [CardController::class, 'whatsapp'])->name('cart.whatsapp');
Route::post('/commande', [CardController::class, 'commande'])->name('commande.speciale');

