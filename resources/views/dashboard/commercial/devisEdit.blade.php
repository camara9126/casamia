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
                <h1>Modification <span class="highlight">Devis</span></h1>
                <div class="btn-group">
                    <a href="{{ route('devis.index') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-right me-1"></i> Retour
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
                @if ($errors->any())
                    <div style="color: red; margin-bottom: 10px;">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="table-responsive">
                    <form action="{{ route('devis.update', $devis) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- CLIENT -->
                        <div class="mb-3">
                            <label>Client</label>
                            <select name="client_id" class="form-control" required>
                                <option value="{{$devis->client->id}}">{{$devis->client->nom}}</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- PRODUITS -->
                        <table class="orders-table" id="table-produits">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    @foreach($devis->details as $index => $detail)
                                    <tr>
                                        <td>
                                            <select name="articles[{{$index}}][article_id]" class="form-control produit-select">
                                                <option value="{{$detail->article->id}}" data-prix="{{ $detail->article->prix }}">{{$detail->article->nom}}</option>
                                                @foreach($articles as $article)
                                                    <option value="{{ $article->id }}" data-prix="{{ $article->prix }}">
                                                        {{ $article->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <input type="number" name="articles[{{$index}}][prix]" value="{{$detail->prix_unitaire}}" class="form-control prix" >
                                        </td>

                                        <td>
                                            <input type="number" name="articles[{{$index}}][quantite]" value="{{$detail->quantite}}" class="form-control quantite" value="1">
                                        </td>

                                        <td>
                                            <input type="number" value="{{$detail->total}}" class="form-control total-ligne" readonly>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-danger remove">X</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <button type="button" id="addRow" class="btn btn-primary">+ Ajouter produit</button>

                            <!-- TOTAL -->
                            <div class="mt-3">
                                <h4>Total : <span id="total-global">0</span> FCFA</h4>
                            </div>

                            <button type="submit" class="btn btn-success mt-3">Modifier</button>
                        </form>
                    </div>
                </div>


    <script>
        let index = 1;

        // Ajouter ligne
        document.getElementById('addRow').addEventListener('click', function () {

            let row = `
            <tr>
                <td>
                    <select name="articles[${index}][article_id]" class="form-control produit-select">
                        <option value="">Choisir</option>
                        @foreach($articles as $article)
                            <option value="{{ $article->id }}" data-prix="{{ $article->prix }}">
                                {{ $article->nom }}
                            </option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <input type="number" name="articles[${index}][prix]" class="form-control prix" >
                </td>

                <td>
                    <input type="number" name="articles[${index}][quantite]" class="form-control quantite" value="1">
                </td>

                <td>
                    <input type="number" class="form-control total-ligne" readonly>
                </td>

                <td>
                    <button type="button" class="btn btn-danger remove">X</button>
                </td>
            </tr>
            `;

            document.querySelector('#table-produits tbody').insertAdjacentHTML('beforeend', row);
            index++;
        });

        // Supprimer ligne
        document.addEventListener('click', function(e){
            if(e.target.classList.contains('remove')){
                e.target.closest('tr').remove();
                calculTotal();
            }
        });

        // Auto remplir prix
        document.addEventListener('change', function(e){
            if(e.target.classList.contains('produit-select')){
                let prix = e.target.selectedOptions[0].dataset.prix;
                let row = e.target.closest('tr');
                row.querySelector('.prix').value = prix;
                calculLigne(row);
            }
        });

        // Calcul ligne
        document.addEventListener('input', function(e){
            if(e.target.classList.contains('quantite')){
                let row = e.target.closest('tr');
                calculLigne(row);
            }
        });

        function calculLigne(row){
            let prix = row.querySelector('.prix').value || 0;
            let quantite = row.querySelector('.quantite').value || 0;

            let total = prix * quantite;
            row.querySelector('.total-ligne').value = total;

            calculTotal();
        }

        // Calcul global
        function calculTotal(){
            let total = 0;

            document.querySelectorAll('.total-ligne').forEach(function(input){
                total += parseFloat(input.value) || 0;
            });

            document.getElementById('total-global').innerText = total.toLocaleString();
        }
    </script>

@include('partials.footer')