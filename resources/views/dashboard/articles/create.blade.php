@include('header')
    <!-- Hero -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Article</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{route('dhome')}}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{route('darticle.index')}}">Articles</a></li> 
                            <li class="breadcrumb-item text-white active" aria-current="page">Article</li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Hero End -->

    <div class="container">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="row">
                    <div class="col-lg-9 col-md-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __("Ajouter un Plat") }}
                    </h2>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('darticle.index') }}" class="btn btn-danger">Annuler</a>
                </div>
            </div>
            </div>
         </div>
         
        
        <div class="py-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('darticle.store') }}" enctype="multipart/form-data" id="create_form">
                @csrf
                
                    <!-- bloc des images -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">Inserer une photo</h2>
                            <div class="row mt-3">
                                <div class="col-md-6 form-group"> <span class="text-danger">*</span>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- bloc des details  -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mb-3">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                             <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">Decriver votre Plat</h2>
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                <label for="title">Nom</label> <span class="text-danger">*</span>
                                <input type="text" name="nom" id="text" class="form-control">
                                </div>

                                <div class=" col-md-6 form-group">

                                    <label for="category">Choisir un Menu</label> <span class="text-danger">*</span>
                                    <select name="menu_id" id="category" class="form-control">
                                        <option value="">Veuiller choisir un menu</option>
                                        @foreach($menu as $menu)
                                        <option value="{{$menu->id}}">{{strtoupper($menu->nom)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label for="price">Prix</label> <span class="text-danger">*</span>
                                    <input type="text" name="prix" id="price" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="price">Prix</label> <span class="text-danger">*</span>
                                    <input type="text" name="prix2" id="price2" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="price">Prix</label> <span class="text-danger">*</span>
                                    <input type="text" name="prix3" id="price3" class="form-control">
                                </div>
                            </div>
                            <div class=" col-md-8 form-group">
                                <label for="content">Description</label> <span class="text-danger">*</span>
                                <textarea name="description" id="content" cols="10" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                   
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <h2 class="font-semibold text-xl text-light-800 leading-tight text-center">
                                <button type="submit" class="btn btn-outline-success">Publier</button>
                            </h2>
                    </div>
            </form>         
        </div>
    </div>
@include('partials.footer')