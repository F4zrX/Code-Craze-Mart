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
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="" method="GET">
                          <input type="search" placeholder="Type Something" id='search' name="search"/>
                          <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                            <li><a href="{{ route('landing.index') }}" >Home</a></li>
                            <li><a href="{{ route('landing.browse') }}" >Browse</a></li>
                            @auth
                                <li><a href="{{ route('landing.cart', ['id' => Auth::id()]) }}">Cart</a></li>
                            @else
                                <li><a href="{{ route('landing.history') }}">Cart</a></li>
                            @endauth
                            <li><a href="{{ route('landing.wishlist') }}" class="active">Wishlist</a></li>
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
          <!-- ***** Live Stream Start ***** -->
          <div class="live-stream">
              <div class="col-lg-12">
                  <div class="heading-section">
                      <h4><em>Wishlist</em> Item</h4>
                  </div>
              </div>
              <div class="row">
                  @foreach($wishlists as $wishlist)
                  <div class="col-lg-3 col-sm-6">
                      <div class="item">
                          <div class="thumb">
                              <a href="{{ route('landing.detail', ['id' => $wishlist->game->id]) }}"> <!-- Tambahkan tautan di sini -->
                                  <img src="{{ asset('storage/image_data/' . $wishlist->game->image) }}" alt="{{ $wishlist->game->nama }}" style="width: 100%; height: 150px;">
                              </a>
                              <div class="hover-effect">
                                  <div class="content">
                                      <div class="live">
                                          <a class="fa fa-heart" data-id="{{ $wishlist->id }}" onclick="removeFromWishlist(event)"></a>
                                      </div>
                                      <ul>
                                          <li><a href="#"><i class="fa fa-eye"></i> {{ $wishlist->game->rating }}</a></li>
                                          <li><a href="#"><i class="fa fa-gamepad"></i> {{ $wishlist->game->kategori ? $wishlist->game->kategori->name : 'Tidak ada kategori' }}</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="down-content">
                              <a href="{{ route('landing.detail', ['id' => $wishlist->game->id]) }}"> <!-- Tambahkan tautan di sini -->
                                  <span>{{ $wishlist->game->nama }}</span>
                              </a>
                              <br>
                              <span> IDR. {{ number_format(floatval($wishlist->game->harga), 0, ',', '.') }}</span>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
          <!-- ***** Live Stream End ***** -->
        </div>
      </div>
    </div>
  </div>
  
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
  <script type="text/javascript">
    function removeFromWishlist(event) {
        event.preventDefault();
        var wishlistId = event.target.getAttribute('data-id');
        if (!wishlistId) {
            console.error('Wishlist ID not found.');
            return;
        }

        // Kirim permintaan AJAX untuk menghapus wishlist
        fetch('/wishlist/' + wishlistId, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => {
            if (response.ok) {
                // Wishlist berhasil dihapus, lakukan tindakan tambahan jika diperlukan
                console.log('Wishlist removed successfully.');
                // Misalnya, perbarui tampilan halaman
                location.reload(); // atau lakukan perubahan secara dinamis tanpa perlu me-refresh halaman
            } else {
                console.error('Failed to remove wishlist.');
            }
        })
        .catch(error => {
            console.error('Error removing wishlist:', error);
        });
    }
</script>


  </body>

</html>
