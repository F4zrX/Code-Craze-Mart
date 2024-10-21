<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Code Craze Mart</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">>
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-cyborg-gaming.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
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
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                        <li><a href="{{ route('landing.index') }}" >Home</a></li>
                        <li><a href="{{ route('landing.browse') }}" class="active">Browse</a></li>
                        @auth
                            <li><a href="{{ route('landing.cart', ['id' => Auth::id()]) }}">Cart</a></li>
                        @else
                            <li><a href="{{ route('landing.history') }}" >Cart</a></li>
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
                <div class="page-content" id="detail">

                    <!-- ***** Product Area Starts ***** -->
                    <div class="row">
                        <!-- Gambar disebelah kiri -->
                        <div class="col-lg-6">
                            <div class="rounded float-left" id="foto">
                                <img src="{{ asset('storage/image_data/'.$game->image) }}" alt=""
                                    style="max-width: 800px">
                            </div>
                        </div>
                        <!-- Informasi disebelah kanan -->
                            <div class="col-lg-6">
                                <div class="card-body p-0" id="infor">
                                    <table class="namagame" style="text-align: left;"> <!-- Menentukan seluruh teks dalam tabel sejajar ke kiri -->
                                        <tr>
                                            <td style="width: 500px" class="h5 text-white mt-0">
                                                <b>{{ $game->nama }}</b>
                                            </td>
                                        </tr>
                                        <tr class="kateg">
                                            <td>
                                                <b>{{ $game->kategori ? $game->kategori->name : 'Tidak ada kategori' }}</b>
                                            </td>
                                            <td class="warna">
                                                <b>{{ $game->rating }}</b>
                                            </td>
                                            <td>
                                                <b>{{ $game->platform }}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 150px">
                                                <b class="text-white">IDR.
                                                    {{ number_format(floatval($game->harga), 0, ',', '.') }}</b>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <h2 class="h5 text-white mt-0">Tentang Game</h2>
                                    <div id="short-description">
                                        <p class="text-white">{{ Str::limit($game->deskripsi, 150) }}</p>
                                        @if (strlen($game->deskripsi) > 150)
                                        <a href="#" id="show-more">Show More</a>
                                        @endif
                                    </div>
                                    <div id="full-description" style="display: none;">
                                        <p class="text-white">{{ $game->deskripsi }}</p>
                                        <a href="#" id="hide-description" style="display: none;">Hide</a>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="d-flex justify-content-between">
                                        <div class="card-footer">
                                        <form action="{{ route('wishlist.add', $game) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-light mt-auto fa fa-heart"></button>
                                        </form>
                                        @if (session('success'))
                                            <div class="alert alert-success mt-3" role="alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('warning'))
                                            <div class="alert alert-warning mt-3" role="alert">
                                                {{ session('warning') }}
                                            </div>
                                        @endif
                                            <form action="{{ route('landing.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="game_id" value="{{$game->id}}">
                                                <br>
                                                <input type="submit" class="btn btn-outline-light mt-auto"
                                                    value="Tambah ke keranjang">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <!-- ***** Product Area Ends ***** -->
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved.

                        <br>Design: <a href="https://templatemo.com" target="_blank"
                            title="free CSS templates">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        document.getElementById('show-more').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('short-description').style.display = 'none';
            document.getElementById('full-description').style.display = 'block';
            document.getElementById('hide-description').style.display = 'inline';
        });

        document.getElementById('hide-description').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('short-description').style.display = 'block';
            document.getElementById('full-description').style.display = 'none';
            document.getElementById('hide-description').style.display = 'none';
        });
    </script>
</body>

</html>
