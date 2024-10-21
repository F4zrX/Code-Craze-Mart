<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Code Craze Mart</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('landing.index') }}" class="logo">
                                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                            <li><a href="{{ route('landing.index') }}" >Home</a></li>
                            <li><a href="{{ route('landing.browse') }}" >Browse</a></li>
                            @auth
                                <li><a href="{{ route('landing.cart', ['id' => Auth::id()]) }}">Cart</a></li>
                            @else
                                <li><a href="{{ route('landing.history') }}">Cart</a></li>
                            @endauth
                            <li><a href="{{ route('landing.wishlist') }}" >Wishlist</a></li>
                            <li>
                                <a href="{{ route('landing.profile') }}" >
                                    Profile 
                                    @auth
                                        @if(Auth::user()->image)
                                            <img src="{{ asset('storage/user/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle" >
                                        @else
                                            <img src="{{ asset('assets/images/profile.jpg') }}" alt="Default Profile Image">
                                        @endif
                                    @else
                                        <img src="{{ asset('assets/images/profile.jpg') }}" alt="Default Profile Image">
                                    @endauth
                                </a>
                            </li>
                        </ul>   
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
          <!-- ***** All Item ***** -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-content">
                          <div id="libraryList">
                            <div class="featured-games header-text">
                                <div class="heading-section">
                                    <h4><em>Your</em> Library</h4>
                                <br>
                                <div class="row justify-content-center">
                                    @foreach ($libraries as $library)
                                    <div class="col mb-5">
                                        <div class="card  bg-dark">

                                            <!-- game image-->
                                            {{-- Cek apakah game memiliki image --}}
                                            @if ($library->game->image)
                                            <img class="card-img-top" src="{{ asset('storage/image_data/' . $library->game->image) }}"
                                                alt="{{ $library->game->nama }}" style="width: 100%; height: 300px;" />
                                            @else
                                            <img class="card-img-top" src="{{ asset('image_data/default-game.png') }}"
                                                alt="default-image" />
                                            @endif

                                            <!-- game details-->
                                            <div class="card-body p-4">
                                                <div class="text-center text-light">
                                                    <!-- game nama-->
                                                    <a href="{{ route('games.show', ['game' => $library->game->id]) }}" style="text-decoration: none" class="text-light">
                                                        <small class="text-strong">{{ $library->game->kategori ? $library->game->kategori->name : 'Tidak ada kategori' }}</small>
                                                        <h5 class="h5 text-light">{{ $library->game->nama }}</h5>
                                                    </a>
                                                    <!-- game reviews-->
                                                    <div class="d-flex justify-content-center small text-warning mb-2 ">
                                                        {{$library->game->rating}}
                                                    </div>
                                                    <!-- game price-->
                                                    Purchased
                                                </div>
                                            </div>
                                            <!-- game actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                <div class="text-center">
                                                    <a href="{{ route('landing.librarydetails', ['id' => $library->game->id]) }}">View
                                                        Details</a>
                                                        <input type="hidden" name="game_id" value="{{$library->game->id}}">
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="game_id" value="{{$library->game->id}}">
                                                        <br>
                                                        <input type="submit" class="btn btn-outline-light mt-auto"
                                                            value="Download">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***** All Item ***** -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved. 
          
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>

</html>
