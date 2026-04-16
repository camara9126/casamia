@include('partials.entete')
        <!-- Hero Start -->
        <div class="container-xxl py-5 bg-dark hero-header mb-2">
                <div class="container text-center my-5 pt-5 pb-2">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Details Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        
         <!-- Single Product Start -->
        <div class="container m-0">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('danger') }}
                    </div>
                @endif
                
                <div class="card mb-0" >
                    <img src="{{asset('storage/'.$articles->image)}}" class="card-img-top" alt="Product Image">
                    <div class="text-center mb-2">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-half text-warning"></i>
                        <small class="text-muted">(4.5)</small>
                    </div>
                    <div class="card-body p-0">
                        <h5 class="card-title"><?= strtoupper($articles->nom)?></h5>
                        <p class="card-text">{{$articles->description}}</p>
                        <div class="">
                            <form action="{{route('panier.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$articles->id}}">
                                    @if(!empty($articles->prix2))
                                    <b>Veuiilez choisir un model :</b>
                                        <p class="mb-0"><b><input type="radio" class="form-check-input" name="model" value="3000">&nbsp;</b>PM ({{number_format($articles->prix)}} FCFA)</p>
                                        <p class="mb-0"><b><input type="radio" class="form-check-input" name="model" value="4000">&nbsp;</b>M ({{number_format($articles->prix2)}} FCFA)</p>
                                        <p class="mb-0"><b><input type="radio" class="form-check-input" name="model" value="5000">&nbsp;</b>GM ({{number_format($articles->prix3)}} FCFA)</p>
                                    @else
                                        <span class="h5 mb-0">{{number_format($articles->prix)}} FCFA</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer bg-light">
                        
                                <button type="submit" class="btn btn-primary mb-2 w-100">
                                    <i class="fa fa-shopping-cart text-white"><sup>+</sup>&nbsp;Ajouter</i>
                                </button>
                            </form>
                    </div>
                </div>
        </div>
        <!-- Team End -->
@include('partials.footer')