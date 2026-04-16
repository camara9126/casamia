@include('partials.entete')
    <!-- Reservation Start -->
        <div class="container-xl py-2 bg-dark hero-header mb-1">
                <div class="container text-center my-2 pt-2 pb-1">
                    <h1 class="display-3 text-white mb-0 animated slideInDown">
                        Menu
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
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
        <div class="container wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-2 g-sm-3 g-xl-4">
                @if($articles->count() > 0)
                @foreach($articles as $article)
                    <div class="col-md-6 col-4 mb-0 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card profile-card w-100">
                            <div class="card-body text-center">
                                <!-- Detail Button -->
                               <a type="button" class="" style="color: #030b51;" data-bs-toggle="modal" data-bs-target="#productModal" data-id="{{ $article->id }}" data-image="{{ asset('storage/'.$article->image) }}" data-name="{{ $article->nom }}" data-description="{{ $article->description }}" data-price="{{ $article->prix }}" data-price2="{{ $article->prix2 }}" data-price3="{{ $article->prix3 }}">
                                    <img src="{{asset('storage/'.$article->image)}}" width="80" alt="User Profile" class="rounded-circle profile-img mb-3">
                               </a>
                               <a type="button" class="" style="color: #030b51;" data-bs-toggle="modal" data-bs-target="#productModal" data-id="{{ $article->id }}" data-image="{{ asset('storage/'.$article->image) }}" data-name="{{ $article->nom }}" data-description="{{ $article->description }}" data-price="{{ $article->prix }}" data-price2="{{ $article->prix2 }}" data-price3="{{ $article->prix3 }}">
                                    <b class="card-title mb-0" style="color: #030b51;">{{$article->nom}}</b>
                               </a>
                               
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <h5 class="text-center">Plat  Indisponible</h5>
                @endif
            </div>
        </div>

        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>

                <div class="modal-body">
                    <h3 class="title fw-bold mb-2"></h3>

                    <!-- Image du produit -->
                    <div class="col-12" style="align-items: center;">
                        <div class="d-flex justify-content-center">
                        <img id="image" src="image" class="image" style="align-items: center;" width="300" alt="Image produit">
                        </div>
                        <div class="text-center">
                            <span class="badge bg-success mb-2">Disponible</span>
                        </div>
                        <div class="text-center mb-2">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                            <small class="text-muted">(4.5)</small>
                        </div>
                    </div>
                    <h5 class="mt-4"><i class="bi bi-card-text"></i>Description</h5>
                    <p class="description"></p>

                     <form action="{{route('panier.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="article_id">
                            
                        <h4 class="price fw-bold text-primary mb-3"></h4>

                    <div class="d-grid gap-2 d-md-flex mt-4">
                        <button class="btn btn-primary flex-fill">
                            <i class="bi bi-cart-plus"></i> Ajouter
                        </button>
                        <a type="button" href="https://wa.me/221785470838" target="_blank" class="btn btn-success border" title="Appeler-Nous">
                            <i class="bi bi-whatsapp"> Contacter-Nous</i>
                        </a>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>

                </div>
            </div>
        </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('productModal');

    modal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const image = button.getAttribute('data-image');
        const description = button.getAttribute('data-description');
        const price = button.getAttribute('data-price');
        const price2 = button.getAttribute('data-price2');
        const price3 = button.getAttribute('data-price3');

        modal.querySelector('#article_id').value = id;
        modal.querySelector('.modal-title').textContent = name;
        modal.querySelector('.modal-body .image').src = image;
        modal.querySelector('.modal-body .title').textContent = name;
        modal.querySelector('.modal-body .description').textContent = description;
        modal.querySelector('.modal-body .price').textContent = price + ' FCFA';
        modal.querySelector('.modal-body .price2').textContent = price2 + ' FCFA';
        modal.querySelector('.modal-body .price3').textContent = price3 + ' FCFA';
    });

});
</script>

 @include('partials.footer')