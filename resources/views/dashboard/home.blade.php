@include('header')
    <!-- Hero -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Tableau de Bord</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{route('dhome')}}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{route('darticle.index')}}">Article</a></li> 
                            <li class="breadcrumb-item"><a href="{{route('dmenu.index')}}">Menu</a></li> 
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Hero End -->
         <p>
            Bienvenue {{auth()->user()->name}}
         </p>
          <div class="row g-2 g-sm-3 g-xl-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                <h5>Menu</h5>
                                <p>{{$menus->count()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                <h5>Plat</h5>
                                <p>{{$articles->count()}}</p>
                            </div>
                        </div>
                    </div>
          </div>
@include('partials.footer')