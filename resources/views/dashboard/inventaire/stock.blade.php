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
                <h1>Gestion du <span class="highlight">Menu</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#exampleModal">
                        <i class="fas fa-plus me-1"></i> Nouveau Mouvement
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
                                    <th>Produit</th>
                                    <th>Type</th>
                                    <th>Quantite</th>
                                    <th>Magasin</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mouvements as $m)
                                <tr>
                                    <td>
                                        <div class="product-info">
                                            <div>
                                                <div style="font-weight: 600;">{{$m->reference}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$m->article->nom}}</td>
                                    <td>{{$m->type}}</td>
                                    <td><strong>{{$m->quantite}}</strong></td>
                                    <td>{{ $m->magasin->nom }}</td>
                                    <td>{{$m->created_at->format('d/m/Y')}}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" align="center">Donnee vide !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> 
                         @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif 
                        <!-- Modal Nouveau mouvement stck-->
                        <div class="modal fade" id="exampleModal" tabindex="-1">
                            <div class="modal-dialog">
                                <form method="post" action="{{route('stocks.store')}}">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Mouvement Stock</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label>Produit</label>
                                                <select class="form-control" name="article_id" id="exampleFormControlSelect1">
                                                    <option value="">-- Veuillez choisir un produit --</option>
                                                    @foreach($articles as $a)
                                                    <option value="{{$a->id}}">{{$a->nom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label>Type</label>
                                                <select class="form-control" name="type" id="exampleFormControlSelect1">
                                                    <option value="">-- Veuillez choisir le type de mouvement --</option>
                                                    <option value="entree">Entree</option>
                                                    <option value="sortie">Sortie</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label>Quantite</label>
                                                <input type="number" name="quantite" min="1" class="form-control" id="exampleInputquantity1">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> 
                    </div>
                </div>
                
            </div>
        </main>
    </div>

@include('partials.footer')