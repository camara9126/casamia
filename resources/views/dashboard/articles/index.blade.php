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

        <!-- Menu Tab -->
        <div  class="">
            <div class="dashboard-header">
                <h1>Gestion du <span class="highlight">Menu</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#articleModal">
                        <i class="fas fa-plus me-1"></i> Ajouter un produit
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
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody >
                             @forelse($articles as $art)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/'.$art->image)}}" width="50" alt="{{$art->title}}">
                                    </td>
                                    <td><strong>{{$art->nom}}</strong></td>
                                    <td>
                                        <span class="badge bg-warning">{{$art->menu->nom}}</span>
                                    </td>
                                    <td>{{$art->prix}}</td>
                                    <td>{{$art->stock}}</td>
                                    <td>
                                        @if($art->statut)
                                            <span class="badge bg-success">Disponnible</span>
                                        @else
                                            <span class="badge bg-danger">Non Disponible</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action btn-edit" data-bs-toggle="modal" data-id="{{ $art->id }}" data-name="{{ $art->nom }}" data-category="{{ $art->menu_id }}" data-price="{{ $art->prix }}" data-description="{{ $art->description }}" data-image="{{ asset('storage/'.$art->image) }}" data-bs-target="#articleEditModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <!--<a href="" class="btn btn-outline-warning"><i class="fa fa-check" aria-hidden="true"></i></a>-->
                                            <form action="{{route('darticle.destroy', $art->id)}}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
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
                                <td colspan="7" align="center">Donnee vide</td>
                            @endforelse
                        </tbody>
                    </table>

                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 

                    <!-- Nouveau article -->
                    <div class="modal fade" id="articleModal" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="post" action="{{route('darticle.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Nouveau menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                 <div class="mb-3">
                                                    <label>Nom du menu</label>
                                                    <input type="text" name="nom" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Categorie</label>
                                                    <select name="menu_id" class="form-control">
                                                        @foreach($menus as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label>Prix</label>
                                            <input type="text" name="prix" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea name="description"  class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                        <!-- Edit article -->
                    <div class="modal fade" id="articleEditModal" tabindex="-1">
                        <div class="modal-dialog">

                            <form method="post" id="editArticleForm" action="" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                 <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modification menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <input type="hidden" name="id" id="article_id">

                                        <div class="mb-3">
                                            <label>Image</label>
                                            <img src="image" id="image" width="100" alt="">
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                 <div class="mb-3">
                                                    <label>Nom du menu</label>
                                                    <input type="text" name="nom" id="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Categorie</label>
                                                    <select name="menu_id" class="form-control">
                                                        <option value="" id="menu_id"></option>
                                                        @foreach($menus as $m)
                                                            <option value="{{ $m->id }}">{{ $m->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label>Prix</label>
                                            <input type="text" name="prix" id="price" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea name="description" id="description"  class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

     <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('articleEditModal');
            const form = document.getElementById('editArticleForm');

            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                // Récupération des données
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const price = button.getAttribute('data-price');
                const description = button.getAttribute('data-description');
                const image = button.getAttribute('data-image');
                const menu_id = button.getAttribute('data-menu_id');
                
                // Remplir le formulaire
                modal.querySelector('#article_id').value = id;
                modal.querySelector('#name').value = name;
                modal.querySelector('#price').value = price;
                modal.querySelector('#description').value = description;
                modal.querySelector('#image').src = image;
                modal.querySelector('#menu_id').value = menu_id;
                
                // Mettre à jour l'action du formulaire avec l'ID récupéré
                const updateUrl = `/darticle/${id}`;
                form.action = updateUrl;
            });
        });
    </script>

    
@include('partials.footer')