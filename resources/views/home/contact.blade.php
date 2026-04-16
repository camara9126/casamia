<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="crsf-token" content="{{ csrf_token() }}">
    <title>O'Food - Restaurant Traiteur | Contactez-Nous</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">  
    <meta name="theme-color" content="#ff9d1b">
    <meta name="google-site-verification" content="Xwx1kjHgpd3Q2cyQyA7s-5_MuTO_d0QpTQtblZtgL08" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Boutton Reservation -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Icon Image -->
     <link rel="shortcut icon" href="{{asset('assets/img/new-logo.png')}}"/>

    <!-- Manifest -->
     <link rel="manifest" href="/manifest.json">
     <meta name="theme-color" content="#ff9d1b">
</head>

<body>
       
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Chargement...</span>
        </div>
    </div>
    <!-- Spinner End -->
            
           

    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        
        <nav class="navbar navbar-expand-lg navbar-white bg-white px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{route('home')}}" class="navbar-brand p-0">
                    <img src="{{asset('assets/img/new-logo.png')}}" width="80" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>&nbsp;
                <a href="{{route('panier.index')}}" class="">
                    <i class="fa fa-shopping-cart text-primary"><sup><b class="text-dark">{{Cart::count()}}</b></sup></i>&nbsp;
                </a>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="{{route('home')}}" class="nav-item nav-link active">Accueil</a>
                    <a href="{{route('menu')}}" class="nav-item nav-link active">Nos Menus</a>
                    <a href="{{route('contact')}}" class="nav-item nav-link active">Contact</a>
                </div>                       
                @auth
                    <a href="{{route('dhome')}}" class="btn btn-success py-1 px-2">
                        <i class="fas fa-user"></i>
                    </a>
                @endauth
            </div>
            </div>
            
        </nav>     
        <!-- Navbar & Hero End -->


        <!-- Icon Fixe -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square icon-fixe dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-headset"></i></a>
        <div class="dropdown-menu m-0">
            <a href="tel:221785470838" type="button" target="_blank" class="dropdown-item text-primary mr-0 pr-0" style="font-size: 12px;">
                <i class="fa fa-headset"></i>&nbsp;Service clientelle
            </a>
            <a href="" type="button" class="dropdown-item text-primary mr-0 pr-0" style="font-size: 12px;" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="fa fa-list"></i>&nbsp;Commande  speciale
            </a>
        </div>
        <div class="modal fade" id="loginModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Faire votre commande speciale en ligne !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('commande.speciale')}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nom Complet</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nom" placeholder="Votre prénom et nom">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Téléphone</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="telephone" placeholder="Entrer votre numéro de telephone">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date de Livraison</label>
                            <div class="input-group">
                                <input type="date" class="form-control" name="date" placeholder="Entrer la date de livraison">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Details de la commande</label>
                            <div class="input-group">
                                <textarea class="form-control" name="commentaire"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-login text-white">Commander</button>
                    </form>
                </div>
            </div>
            </div>
        </div>
        
 <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Contactez-Nous</h5>
                    <h1 class="mb-5">Contact pour toute question</h1>
                </div>
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <p class="mb-2"><i class="fa fa-map-marker-alt"></i>St-Louis, SENEGAL</p>
                            <p class="mb-2"><i class="fa fa-phone-alt"></i>(+221)78-547-08-38</p>
                            <p class="mb-2"><i class="fa fa-envelope"></i>contact@ofood.com</p>
                            
                        </div>
                    </div>

                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.6519717366664!2d-16.508421624078398!3d16.03162264044197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe9557b6aef8b301%3A0xc80ca1adb5c8b87a!2sQuai%20Giraud%2C%20St%20Louis!5e0!3m2!1sfr!2ssn!4v1760959573618!5m2!1sfr!2ssn" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>

                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-primary btn-social" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-primary btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-social" href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        @include('partials.footer')