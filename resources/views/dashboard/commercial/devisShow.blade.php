    @include('partials.entete')


    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="spinner"></div>
        <p class="mt-3">Chargement en cours...</p>
    </div>

    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content (CACHÉ initialement) -->
    <div class="main-content" id="mainContent">

        <!-- Tabs Navigation -->
        <div class="tabs-navigation mb-4" id="tabsNav">
            <a href="{{ route('commercial') }}" class="tab-btn active">Retour</a>
            <a href="{{ route('clients.index') }}" class="tab-btn">Clients</a>
            <a href="" class="tab-btn">Devis</a>
            <a href="" class="tab-btn">Vente</a>
        </div>

        <!-- Menu Tab -->
        <div  class="">
            <div class="dashboard-header">
                <h1>Gestion du <span class="highlight">Menu</span></h1>
                <div class="btn-group">
                    <a href="{{ route('devis.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Nouveau devis
                    </a>
                </div>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
            @endif

            <div class="orders-section">
                    <!-- INFOS ENTREPRISE -->
                <div class="mb-4">
                    <h4>{{ $devis->entreprise->nom ?? 'Entreprise' }}</h4>
                    <p>Date : {{ $devis->date_devis }}</p>
                    <p>Référence : {{ $devis->reference }}</p>

                    <p>
                        Statut :
                        @if($devis->statut == 'en_attente')
                            <span class="badge bg-warning">En attente</span>
                        @elseif($devis->statut == 'valide')
                            <span class="badge bg-success">Validé</span>
                        @else
                            <span class="badge bg-danger">Refusé</span>
                        @endif
                    </p>
                </div>

                <!-- CLIENT -->
                <div class="mb-4">
                    <h5>Client</h5>
                    <p>Nom : {{ $devis->client->nom }}</p>
                    <p>Téléphone : {{ $devis->client->telephone ?? '-' }}</p>
                </div>

                <!-- TABLE PRODUITS -->
                <table class="">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix unitaire</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($devis->details as $detail)
                            <tr>
                                <td>{{ $detail->article->nom ?? '-' }}</td>
                                <td>{{ $detail->quantite }}</td>
                                <td>{{ number_format($detail->prix_unitaire, 0, ',', ' ') }} FCFA</td>
                                <td>{{ number_format($detail->total, 0, ',', ' ') }} FCFA</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- TOTAL -->
                <div class="text-end mt-3">
                    <h4>Total : {{ number_format($devis->total, 0, ',', ' ') }} FCFA</h4>
                </div>

                <!-- ACTIONS -->
                <div class="mt-4 d-flex gap-2">

                    
                    
                </div>

                </div>  
    
@include('partials.footer')