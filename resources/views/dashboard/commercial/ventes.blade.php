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
                <h1>Gestion des <span class="highlight">Ventes</span></h1>
                <div class="btn-group">
                    <a href="{{ route('ventes.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Nouvelle vente
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
                                        <!--<th>Montant TVA</th>-->
                                        <th>Montant Total</th>
                                        <th>Montant Payer</th>
                                        <th>Montant Restant</th>
                                        <th>Date</th>
                                        <th>Statut</th>
                                        <th>Paiement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ventes as $v)
                                    <tr>
                                        <td>{{$v->reference}}</td>
                                        <td>{{$v->client->nom ?? 'Client supprimee'}}</td>
                                        <!--<td>{{number_format($v->total_tva, 0, ',',' ')}} XOF</td>-->
                                        <td>{{number_format($v->total_ttc, 0, ',',' ')}} XOF</td>
                                        <td>{{number_format($v->montant_paye, 0, ',', ' ')}} XOF</td>
                                        <td>{{number_format($v->montant_restant, 0, ',', ' ')}} XOF</td>
                                        <td>{{$v->created_at->format('d/m/y')}}</td>
                                        <td>
                                            @if($v->statut == 'payee')
                                                <span class="status-badge badge bg-success">{{$v->statut}}</span>
                                            @elseif($v->statut == 'partielle')
                                                <span class="status-badge badge bg-info">{{$v->statut}}</span>
                                            @else
                                                <span class="status-badge badge bg-danger">{{$v->statut}}</span>
                                            @endif
                                        </td>
                                         <td>
                                            @if($v->montant_restant == 0)
                                                <button type="button" class="btn btn-secondary">
                                                        Payée
                                                </button>
                                            @else
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-id="{{$v->id}}" data-bs-target="#paiementModal">Payer
                                            </button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{route('ventes.show', $v->id)}}" class="btn-action btn-edit" title="afficher la facture">
                                                    <i class="fas fa-eye text-warning"></i>
                                                </a>
                                                <form action="{{route('ventes.destroy', $v->id)}}" type="button" method="post" onsubmit="return confirm   ('Supprimer ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-action btn-delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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
                                {{$ventes->links()}}
                            </div>
                            <div class="modal fade" id="paiementModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="{{ route('paiements.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Paiement</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="vente_id" id="vente_id">

                                                <div class="mb-3">
                                                    <label>Montant à payer</label>
                                                    <input type="number" name="montant" class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Date du paiement</label>
                                                    <input type="date" name="date_paiement" class="form-control" value="{{ date('Y-m-d') }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Mode de paiement</label>
                                                    <select name="mode_paiement" class="form-select" required>
                                                        <option value="cash">Cash</option>
                                                        <option value="wave">Wave</option>
                                                        <option value="orange_money">Orange Money</option>
                                                        <option value="autre">Autre</option>
                                                    </select>
                                                </div>

                                                <button class="btn btn-success">
                                                    Enregistrer le paiement
                                                </button>
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>  

                <!-- Recuperation de l'ID de la vente-->
    <script>
        
        document.addEventListener('DOMContentLoaded', function () {

            const modal = document.getElementById('paiementModal');

            modal.addEventListener('show.bs.modal', function (event) {

                const button = event.relatedTarget;

                const id = button.getAttribute('data-id');

                modal.querySelector('#vente_id').value = id;
            });
        });

        
    </script>
    
@include('partials.footer')