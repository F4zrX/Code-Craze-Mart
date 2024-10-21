
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{asset ('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset ('assets/css/tiny-slider.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/templatemo-cyborg-gaming.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/animate.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <title>Code Craze Mart</title>
</head>

<body>

    <!-- Start Header/Navigation -->
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
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{ route('landing.index') }}" >Home</a></li>
                            <li><a href="{{ route('landing.browse') }}">Browse</a></li>
                            @auth
                            <li><a href="{{ route('landing.cart', ['id' => Auth::id()]) }}" class="active">Cart</a></li>
                            @else
                            <li><a href="{{ route('landing.history') }}" class="active">Cart</a></li>
                            @endauth
                            <li><a href="{{ route('landing.wishlist') }}">Wishlist</a></li>
                            <li>
                                <a href="{{ route('landing.profile') }}">
                                    Profile
                                    @auth
                                    @if(Auth::user()->image)
                                    <img src="{{ asset('storage/user/' . Auth::user()->image) }}"
                                        alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle">
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
    <!-- End Header/Navigation -->



    <!--Isi-->

    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <div class="page-content">
                            <table class="table">
                                <thead>
                                    <tr>
                                      <th class="product-thumbnail">Gambar</th>
                                      <th class="product-name">Barang</th>
                                      <th class="product-price">Harga</th>
                                      <th class="product-quantity">Jumlah</th>
                                      <th class="product-total">Subtotal</th>
                                      <th class="product-remove">Hapus</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-white btn-sm btn-block" onclick="location.reload()">Update Cart</button>
                  </div>
                  <div class="col-md-6">
                      <a href="{{ route('landing.browse') }}" class="btn btn-outline-white btn-sm btn-block">Lanjut Belanja</a>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-white h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-white">Apply Coupon</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-white h4 text-uppercase">Total Keranjang Belanja</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-white">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-white">IDR. 0</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-white btn-lg py-3 btn-block"
                                    onclick="window.location='checkout.html'">Lanjut Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Isi-->

    <!-- Start Footer Section -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2024 <a href="#">Muhammad Fazri Sidi Umar</a> Company. All rights reserved.

                        <br>Design: <a href="https://templatemo.com" target="_blank"
                            title="free CSS templates">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/custom1.js"></script>
</body>

</html>
