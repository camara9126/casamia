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
            <a href="{{ route('devis.index') }}" class="tab-btn">Devis</a>
            <a href="{{ route('ventes.index') }}" class="tab-btn">Vente</a>
        </div>

        <!-- Menu Tab -->
        <div  class="">
            <div class="dashboard-header">
                <h1>Gestion du <span class="highlight">Devis</span></h1>
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
                        <div class="table-responsive">
                            <table class="orders-table">
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Client</th>
                                        <th>Total Devis</th>
                                        <th>Date de devis</th>
                                        <th>Date d'expiration</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($devis as $d)
                                    <tr>
                                        <td>{{$d->reference}}</td>
                                        <td>{{$d->client->nom ?? 'Client supprimee'}}</td>
                                        <td>{{number_format($d->total, 0, ',',' ')}} XOF</td>
                                        <td>{{$d->date_devis}}</td>
                                        <td>{{$d->date_expiration}}</td>
                                        <td>
                                            @if($d->statut == 'valide')
                                                <span class="status-badge badge-success">{{$d->statut}}</span>
                                            @elseif($d->statut == 'en_attente')
                                                <span class="status-badge badge-warning">{{$d->statut}}</span>
                                            @else
                                                <span class="status-badge badge-danger">{{$d->statut}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{route('devis.show', $d->id)}}" class="btn btn-outline-warning mr-2" title="afficher le devis">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="{{route('devis.edit', $d->id)}}" class="btn btn-outline-info mr-2" title="modifier le devis">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                            </div>
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
                                {{$devis->links()}}
                            </div>
                        </div>
                    </div>
                </div>  
    
@include('partials.footer')