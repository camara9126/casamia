@include('header')
    <!-- Hero -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Tableau de Bord</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/\{{route('dhome')}}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{route('darticle.index')}}">Articles</a></li> 
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <form method="POST" action="{{ route('dmenu.update', ['dmenu'=>$menu->id]) }}" enctype="multipart/form-data" id="create_form">
                @method('PUT')
                @csrf
                    <!-- bloc des images -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <img src="{{asset('storage/'.$menu->image)}}" width="100" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="">Nom</label>
                                    <input type="text" value="{{$menu->nom}}" name="nom" id="name" class="form-control">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" id="content" cols="10" rows="5" class="form-control">{{$menu->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">
                                <button type="submit" class="btn btn-outline-success">Ajouter</button>
                            </h2>
                    </div>
            </form>
@include('partials.footer')