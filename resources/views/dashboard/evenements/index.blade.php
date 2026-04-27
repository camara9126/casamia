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
                <h1>Gestion d' <span class="highlight">Evenement</span></h1>
                <div class="btn-group">
                    <button class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#evenementModal">
                        <i class="fas fa-plus me-1"></i> Nouveau enevement
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
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Description</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody >
                             @forelse($evenements as $e)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/'.$e->image)}}" width="50" alt="{{$e->title}}">
                                    </td>
                                    <td><strong>{{$e->titre}}</strong></td>
                                    <td>{{$e->date}}</td>
                                    <td>{{$e->heure}}</td>
                                    <td>{{$e->description}}</td>
                                    <td>
                                        @if($e->statut)
                                            <span class="badge bg-success">Disponnible</span>
                                        @else
                                            <span class="badge bg-danger">Non Disponible</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn-action btn-edit" data-bs-toggle="modal" data-id="{{ $e->id }}" data-titre="{{ $e->titre }}" data-date="{{ $e->date }}" data-heure="{{ $e->heure }}" data-description="{{ $e->description }}" data-image="{{ asset('storage/'.$e->image) }}" data-bs-target="#evenementEditModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <!--<a href="" class="btn btn-outline-warning"><i class="fa fa-check" aria-hidden="true"></i></a>-->
                                            <form action="{{route('evenements.destroy', $e->id)}}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
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

                    <!-- Nouveau evenement -->
                    <div class="modal fade" id="evenementModal" tabindex="-1">
                        <div class="modal-dialog">
                            <form method="post" action="{{route('evenements.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Nouveau evenement</h5>
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
                                                    <label>Titre de l'evenement</label>
                                                    <input type="text" name="titre" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Date</label>
                                                    <input type="date" name="date" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label>Heure</label>
                                            <input type="time" name="heure" class="form-control">
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

                        <!-- Edit evenement -->
                    <div class="modal fade" id="evenementEditModal" tabindex="-1">
                        <div class="modal-dialog">

                            <form method="post" id="editEvenementForm" action="" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                 <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Modification menu</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">

                                        <input type="hidden" name="id" id="evenement_id">

                                        <div class="mb-3">
                                            <label>Image</label>
                                            <img src="image" id="image" width="100" alt="">
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                 <div class="mb-3">
                                                    <label>Nom du menu</label>
                                                    <input type="text" name="titre" id="titre" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Date</label>
                                                    <input type="date" name="date" id="date" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label>Heure</label>
                                            <input type="time" name="heure" id="heure" class="form-control">
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
            const modal = document.getElementById('evenementEditModal');
            const form = document.getElementById('editEvenementForm');

            modal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;

                // Récupération des données
                const id = button.getAttribute('data-id');
                const titre = button.getAttribute('data-titre');
                const date = button.getAttribute('data-date');
                const heure = button.getAttribute('data-heure');
                const description = button.getAttribute('data-description');
                const image = button.getAttribute('data-image');
                
                // Remplir le formulaire
                modal.querySelector('#evenement_id').value = id;
                modal.querySelector('#titre').value = titre;
                modal.querySelector('#date').value = date;
                modal.querySelector('#heure').value = heure;
                modal.querySelector('#description').value = description;
                modal.querySelector('#image').src = image;
                
                // Mettre à jour l'action du formulaire avec l'ID récupéré
                const updateUrl = `/evenements/${id}`;
                form.action = updateUrl;
            });
        });
    </script>

    
@include('partials.footer')