@include('partials.entete')
        <!-- Menu Start -->
            <div class="container-xxl py-2 bg-dark hero-header mb-2">
                <div class="container text-center my-5 pt-2 pb-2">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Panier</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Panier</li>
                        </ol>
                    </nav>
                </div>
            </div>
             
                    @if(Cart::count() > 0)
                    <div class="container py-2">
                        <h1 class="">Votre panier</h1>
                        <div class="text-start mb-2">
                            <a href="{{route('home')}}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-1"></i>
                            </a>
                        </div>
                        <div class="row g-2 g-sm-3 g-xl-4">
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @elseif(Session::has('danger'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('danger') }}
                                </div>
                            @endif
                            <div class="col-lg-8">
                                <!-- Cart Items -->
                                <div class="card d-flex flex-column">                                    
                                    <div class="card-body">
                                        <!-- 1er ligne-->
                                    @foreach(Cart::content() as $articles)
                                        <div class="row cart-item mb-2">
                                            <div class="col-md-5 col-5">
                                                <img src="{{asset('storage/'.$articles->model->image)}}" alt="{{$articles->model->nom}}" width="100" class="img-fluid rounded">
                                            </div>
                                            <div class="col-md-7 col-7">
                                                <p class="card-title m-0"><?= strtoupper($articles->name)?></p>
                                                <p class="text-muted m-0">Menu:
                                                     @foreach($menus as $menu)
                                                     @if($menu->id == $articles->model->menu_id)
                                                        <b>{{$menu->nom}}</b>
                                                    @endif
                                                    @endforeach
                                                    <!-- Prix plat -->
                                                    <p class="fw-bold mb-0">{{number_format($articles->price, 0, ',', ' ')}} FCFA&nbsp;({{$articles->options->model}})</p>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- 2nd ligne-->
                                        <div class="row g-2 g-sm-3 g-xl-4">    
                                            <div class="col-md-6 col-6">
                                                <form action="{{route('panier.destroy', $articles->rowId)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn" >
                                                        <p class="text-primary"><i class ="bi bi-trash">&nbsp;Supprimer</i></p>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <div class="input-group">
                                                    <a href="{{ route('panier.moins', $articles->rowId) }}" class="btn btn-primary btn-sm">+</a>
                                                    <span style="max-width:80px" id="qty-{{$articles->rowId}}" class="form-control text-center">{{$articles->qty}}</span>
                                                    <a href="{{ route('panier.plus', $articles->rowId) }}" class="btn btn-primary btn-sm">+</a>
                                                </div>
                                            </div>
                                            <!-- Total plat -->
                                            <p>Total plat : 
                                                <strong id="item-total-{{ $articles->rowId }}">
                                                    {{ number_format($articles->price * $articles->qty) }} FCFA
                                                </strong>
                                            </p>

                                            <hr>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                                                                
                            </div>
                            <div class="col-lg-4">
                                <!-- Bouton whatsapp -->
                                <div class="card cart-summary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2 col-2">
                                               <a href="tel:+221785470838" target="_blank" class="btn btn-white mb-2 w-90 border" title="Appeler-Nous">
                                                <i class="bi bi-phone text-primary"></i>
                                            </a>
                                            </div>
                                            <div class="col-md-10 col-10">
                                                <a href="{{route('cart.whatsapp')}}" target="_blank" class="btn btn-primary mb-2 w-90" title="contact whatsapps"><i class="bi bi-whatsapp"></i>&nbsp;Commander ({{Cart::subtotal()}}&nbsp;FCFA)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <h5 class="text-center">Votre panier est vide !</h5>
                    @endif
                    </div>
        <!-- Menu End -->
        
        
@include('partials.footer')