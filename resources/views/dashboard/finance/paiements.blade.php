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
            <a href="{{ route('dhome') }}" class="tab-btn active">Tableau de bord</a>
            <a href="{{ route('paiements.index') }}" class="tab-btn">Paiements</a>
            <a href="{{ route('recettes.index') }}" class="tab-btn">Recettes</a>
            <a href="{{ route('depenses.index') }}" class="tab-btn">Depenses</a>
        </div>

        <!-- Menu Tab -->
        <div  class="">
            <div class="dashboard-header">
                <h1>Gestion des <span class="highlight">Paiements</span></h1>
                <div class="btn-group">
                    
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
                <div class="table-responsive">
                        <table class="orders-table">
                               <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Client</th>
                                        <th>Montant</th>
                                        <th>Date de paiement</th>
                                        <!--<th>Mode de paiement</th>-->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($paiements as $p)
                                    <tr>
                                        <td>{{$p->reference}}</td>
                                        <td>{{optional($p->vente->client)->nom ?? '-'}}</td>
                                        <td>{{max(0, number_format($p->montant, 0, ',',' '))}} XOF</td>
                                        <td>{{$p->date_paiement}}</td>
                                        <!--<td>{{$p->mode_paiement}}</td>-->
                                        <td>
                                            @if($p->statut === 'valide')
                                                <form action="{{ route('paiements.annuler', $p->id) }}" method="POST" onsubmit="return confirm('Confirmer l’annulation du paiement ?')">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-outline-danger btn-sm" title="Annuler le paiement">
                                                        <i class="fa-solid fa-times"></i>
                                                    </button>
                                                </form>
                                            @else
                                                    <button class="btn btn-secondary btn-sm" title="Paiement annule">
                                                        <i class="fa-solid fa-times"></i>
                                                    </button>
                                            @endif                                    
                                        </td>                                                        
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" align="center">Donnee vide !</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {{$paiements->links()}}
                            </div>
                        </div>
                    </div>
                </div>

@include('partials.footer')