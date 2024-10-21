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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="/" method="GET">
                          <input type="search" placeholder="Type Something" id='search' name="search"/>
                          <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('landing.index') }}" class="active">Home</a></li>
                        <li><a href="{{ route('landing.browse') }}">Browse</a></li>
                        @auth
                            <li><a href="{{ route('landing.cart', ['id' => Auth::id()]) }}">Cart</a></li>
                        @else
                            <li><a href="{{ route('landing.history') }}">Cart</a></li>
                        @endauth
                        <li><a href="{{ route('landing.wishlist') }}">Wishlist</a></li>
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
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">
        <!-- ***** Banner Start ***** -->
         <!-- Swiper -->
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              @foreach($sliders as $slider)
              <div class="swiper-slide" style="background-image: url('{{ asset('storage/images/'.$slider->image) }}');">
                <div class="row">
                  <div class="col-lg-7">
                    <div id="hed">
                    <div class="header-text">
                      <h6>Welcome To Code Craze Mart</h6>
                      <h4><em>Browse</em> Our Popular Sell Here</h4>
                      <div class="main-button">
                        <a href="{{ route('landing.browse') }}">Browse Now</a>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        <!-- ***** Banner End ***** -->
          <!-- ***** New Item Start ***** -->
            <div class="most-popular">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4><em>New</em> Item</h4>
                        </div>
                        <div class="row">
                            @php $count = 0; @endphp
                            @foreach ($games as $game)
                                @php $count++; @endphp
                                @if ($count <= 8)
                                    <div class="col-lg-3 col-sm-8">
                                        <div class="item">
                                            <div class="item-content">
                                                <img src="{{ asset('storage/image_data/' . $game->image) }}" alt="{{ $game->nama }}" class="item-image">
                                                <h4>{{ $game->nama }}<br><span>{{ $game->kategori ? $game->kategori->name : 'Tidak ada kategori' }}</span></h4>
                                                <ul>
                                                    <li><i class="fa fa-star"></i> {{$game->rating}}</li>
                                                    <li><a href="{{ route('landing.detail', ['id' => $game->id]) }}" class="fa fa-download"></a> Buy</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- Show More Button -->
                        @if (count($games) > 8)
                            <div class="text-center mt-3">
                                <a href="{{ route('landing.browse') }}" class="btn btn-primary">Show More</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
          <!-- ***** New Item End ***** -->


         <!-- ***** Gaming Library Start ***** -->
        <div class="gaming-library">
          <div class="col-lg-12">
            <div class="heading-section">
              <h4><em>Your Gaming</em> Library</h4>
            </div>
            @php $count = 0; @endphp
            @if(collect($libraries)->isNotEmpty())
                @foreach($libraries as $library)
                @php $count++; @endphp
                  @if ($count <= 3)
                    <div class="item">
                        <ul>
                            <li><img src="{{ asset('storage/image_data/' . $library->game->image) }}" alt="" class="templatemo-item"></li>
                            <li><h4>{{ $library->game->nama }}</h4><span>{{ $library->game->kategori ? $library->game->kategori->name : 'Tidak ada kategori' }}</span></li>
                            <li><h4>Date Added</h4><span>{{ $library->created_at->format('d/m/Y') }}</span></li>
                            <li><h4>Hours Played</h4><span>#</span></li>
                            <li><h4>Currently</h4><span>{{ $library->status }}</span></li>
                            <li><div class="main-border-button border-active"><a href="https://cdn.cloudflare.steamstatic.com/client/installer/SteamSetup.exe">Downloaded</a></div></li>
                        </ul>
                    </div>
                    @endif
                @endforeach
            @else
                <p>No games in library</p>
            @endif
            @if (count($libraries) > 3)
            <div class="col-lg-12">
              <div class="main-button">
                  <a href="{{ route('landing.library') }}">View Your Library</a>
              </div>
            </div>
            @endif
          </div>
        </div>
        <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2024 <a href="#">Muhammad Fazri Sidi Umar</a> Company. All rights reserved. 
          
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
  <!-- Link JavaScript Swiper -->
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      pagination: {
        el: ".swiper-pagination",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
  </body>

</html>
