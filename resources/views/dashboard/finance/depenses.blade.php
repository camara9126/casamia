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
                <h1>Gestion des <span class="highlight">Depenses</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#depenseModal">
                        <i class="fas fa-plus me-1"></i> Nouveau depense
                    </button>
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
                                        <th>Date</th>
                                        <th>Libelle</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($depenses as $d)
                                    <tr>
                                        <td>{{$d->reference}}</td>
                                        <td>{{$d->date_depense}}</td>
                                        <td>{{$d->libelle}}</td>
                                        <td>{{number_format($d->montant, 0, ',',' ')}} XOF</td>
                                        <td>
                                            <span class="badge bg-{{ $d->statut == 'payee' ? 'success' : 'danger' }}">
                                                {{ ucfirst($d->statut) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" align="center">Donnee vide !</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>    
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{$depenses->links()}}
                        </div>
                        <!-- Modal paiement -->
                        <div class="modal fade" id="depenseModal" tabindex="-1">
                            <div class="modal-dialog">
                               <form action="{{ route('depenses.store') }}" method="POST" class="contact-form">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Depense</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <!-- Libellé -->
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Libellé de la dépense</label>
                                                    <input type="text" name="libelle" class="form-control" placeholder="Ex : Achat marchandises" required>
                                                </div>

                                                <!-- Montant -->
                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Montant (FCFA)</label>
                                                    <input type="number" name="montant" class="form-control" step="0.01" required>
                                                </div>

                                                <!-- Date -->
                                                <div class="col-6 mb-3">
                                                    <label class="form-label">Date de la dépense</label>
                                                    <input type="date" name="date_depense" class="form-control" value="{{ date('Y-m-d') }}" required>
                                                </div>

                                                <!-- Mode de paiement -->
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Mode de paiement</label>
                                                    <select name="mode_paiement" class="form-control" required>
                                                        <option value="">-- Choisir --</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="moblie_money">Mobile Money</option>
                                                        <option value="virement">Virement</option>
                                                        <option value="cheque">Cheque</option>
                                                        <option value="autre">Autre</option>
                                                    </select>
                                                </div>

                                                <!-- Description -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Description (optionnelle)</label>
                                                    <textarea name="description" class="form-control" rows="3" placeholder="Détails supplémentaires..."></textarea>
                                                </div>

                                            </div>
                                            <!-- Bouton -->
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">
                                                    💾 Enregistrer la dépense
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>

@include('partials.footer')