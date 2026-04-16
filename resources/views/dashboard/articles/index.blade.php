@include('header')
    <!-- Hero -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Liste des Articles</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{route('dhome')}}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{route('darticle.index')}}">Articles</a></li> 
                            <li class="breadcrumb-item"><a href="{{route('dmenu.index')}}">Menu</a></li> 
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Hero End -->
          @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
            @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-6">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __("Articles") }}
                    </h2>
                </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('darticle.create') }}" class="btn btn-primary">Ajout Article</a>
                    </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Menu</th>
                                            <th scope="col">Prix</th>
                                            <th scope="col">Date Creation</th>
                                        <!-- <th scope="col">Statut</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($articles as $art)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                <img src="{{asset('storage/'.$art->image)}}"width="100" alt="{{$art->title}}">
                                            </td>
                                            <td>{{$art->nom}}</td>
                                            <td>
                                                @foreach($menus as $menu)
                                                    @if($menu->id == $art->menu_id)
                                                        {{$menu->nom}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$art->prix}}</td>
                                            <td>{{$art->created_at}}</td>
                                            <td>
                                            <a href="{{route('darticle.edit',$art->id)}}" class="btn btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                <!--<a href="" class="btn btn-outline-warning"><i class="fa fa-check" aria-hidden="true"></i></a>-->
                                                <form action="{{route('darticle.destroy', $art->id)}}" type="button" method="post" onsubmit="return confirm('Supprimer ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                        <div class="row text-center mt-4">
                            <div class="clo-12">
                                {{$articles->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@include('partials.footer')