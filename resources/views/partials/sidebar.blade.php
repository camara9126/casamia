<?php

    use App\Models\Article;
    use App\Models\Menu;

    $menus= Menu::latest()->get();
    $articles= Article::latest()->get();

?>
<div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div style="width: 40px; height: 40px; background: var(--primary-color); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-utensils"></i>
            </div>
            <h2><span class="brand-first">Casa</span> Mia</h2>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dhome') }}" class="active" id="dashboardLink">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dmenu.index') }}" >
                    <i class="fas fa-utensils"></i>
                    <span>Categorie</span>
                </a>
            </li>
            <li>
                <a href="#" id="ordersLink">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Commandes</span>
                    <span class="badge bg-warning ms-auto" id="ordersBadge">0</span>
                </a>
            </li>
            <li>
                <a href="{{ route('darticle.index') }}" >
                    <i class="fas fa-utensils"></i>
                    <span>Menu</span>
                    <span class="badge bg-warning ms-auto" id="ordersBadge">{{ $articles->count() }}</span>
                </a>
            </li>
            <li>
                <a href="#" id="customersLink">
                    <i class="fas fa-users"></i>
                    <span>Clients</span>
                </a>
            </li>
            <li>
                <a href="#" id="inventoryLink">
                    <i class="fas fa-boxes"></i>
                    <span>Inventaire</span>
                </a>
            </li>
            <li>
                <a href="{{route('accueil')}}" id="homeLink">
                    <i class="fas fa-home"></i>
                    <span>Retour au site</span>
                </a>
            </li>
            <li>
                <a href="">
                @auth
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                         <i class="fas fa-sign-out-alt"></i>
                            <button class="btn text-white">Déconnexion</button>
                    </form>
                @endauth
                </a>
               
            </li>
        </ul>
    </div>