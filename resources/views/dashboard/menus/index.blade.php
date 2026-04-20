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

             @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
            @endif

            <div class="dashboard-header">
                <h1>Gestion du <span class="highlight">Categorie</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#menuModal">
                        <i class="fas fa-plus me-1"></i> Ajouter un categorie
                    </button>
                </div>
            </div>

            <div class="orders-section">
                <div class="table-responsive">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody >
                             @forelse($menus as $m)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/'.$m->image)}}" width="50" alt="{{$m->title}}">
                                    </td>
                                    <td><strong>{{$m->nom}}</strong></td>
                                    
                                    <td>{{$m->description}}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action btn-edit" data-bs-toggle="modal" data-id="{{ $m->id }}" data-name="{{ $m->nom }}" data-description="{{ $m->description }}" data-image="{{ asset('storage/'.$m->image) }}" data-bs-target="#menuEditModal">
                                               <i class="fas fa-edit"></i>
                                            </button>
                                        <!--<a href="" class="btn btn-outline-warning"><i class="fa fa-check" aria-hidden="true"></i></a>-->
                                            <form action="{{route('dmenu.destroy', $m->id)}}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        <div>
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

                    <!-- Nouveau client -->
                    <div class="modal fade" id="menuModal" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="post" action="{{route('dmenu.store')}}"  enctype="multipart/form-data" >
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Nouveau categorie</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Nom du categorie</label>
                                            <input type="text" name="nom" class="form-control" required>
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

                        <!-- Edit catagorie -->
                    <div class="modal fade" id="menuEditModal" tabindex="-1">
                        <div class="modal-dialog">

                            <form method="post" id="editMenuForm" action="" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modification categorie</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="menu_id">

                                        <div class="mb-3">
                                            <label>Image</label>  
                                            <img src="image" name="image" id="image" width="100" alt="">
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label>Nom du categorie</label>
                                            <input type="text" name="nom" id="name" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label>Description</label>
                                            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
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
            const modal = document.getElementById('menuEditModal');
            const form = document.getElementById('editMenuForm');

            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                // Récupération des données
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const description = button.getAttribute('data-description');
                const image = button.getAttribute('data-image');
                
                // Remplir le formulaire
                modal.querySelector('#menu_id').value = id;
                modal.querySelector('#name').value = name;
                modal.querySelector('#description').value = description;
                modal.querySelector('#image').src = image;
                
                // Mettre à jour l'action du formulaire avec l'ID récupéré
                const updateUrl = `/dmenu/${id}`;
                form.action = updateUrl;
            });
        });
    </script>
    
</body>
</html>