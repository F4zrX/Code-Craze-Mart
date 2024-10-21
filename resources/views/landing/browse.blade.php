<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Code Craze Mart</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-cyborg-gaming.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
                                <li><a href="{{ route('landing.browse') }}" class="active">Browse</a></li>
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
      <!-- ***** All Item ***** -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="featured-games header-text">
                        <div class="heading-section">
                            <h4><em>All</em> Item</h4>
                        </div>

                        <!-- Sort by dropdown -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    Sort by
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                    <li><a class="dropdown-item" href="{{ route('browse.sortByName') }}">Name (A-Z)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('browse.sortByPrice') }}">Price (High to Low)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('browse.sortbypricelowtohigh') }}">Price (Low to High)</a></li>
                                </ul>
                            </div>

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="categoryDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    Filter by Category
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                                    @foreach($categories as $category)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('landing.browse.kategori', ['category' => $category->id]) }}">
                                                {{ $category->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Game list -->
                        <div class="row justify-content-center">
                            @foreach ($games as $game)
                            <div class="col mb-5">
                                <div class="card bg-dark" > <!-- Tentukan max-width di sini -->
                                    @if ($game->harga != 0)
                                    <!-- Sale badge-->
                                    <div class="badge bg-success text-white position-absolute"
                                        style="top: 0.5rem; right: 0.5rem">Sale</div>
                                    @endif

                                    <!-- game image-->
                                    {{-- Cek apakah game memiliki image --}}
                                    @if ($game->image)
                                    <img class="card-img-top" src="{{ asset('storage/image_data/' . $game->image) }}"
                                        alt="{{ $game->nama }}" style="width: 100%; height: 300px;" />
                                    @else
                                    <img class="card-img-top" src="{{ asset('image_data/default-game.png') }}"
                                        alt="default-image" style="width: 100%; height: 250px;" />
                                    @endif

                                    <!-- game details-->
                                    <div class="card-body p-4" style="height: 100%;">
                                        <div class="text-center text-light">
                                            <!-- game nama-->
                                            <a href="{{ route('games.show', ['game' => $game->id]) }}"
                                                style="text-decoration: none" class="text-light">
                                                <small class="text-strong">{{ $game->kategori ? $game->kategori->name : 'Tidak ada kategori' }}</small>
                                                <h5 class="h5 text-light">{{ $game->nama }}</h5>
                                            </a>
                                            <!-- game reviews-->
                                            <div class="d-flex justify-content-center small text-warning mb-2 ">
                                                {{$game->rating}}
                                            </div>
                                            <!-- game price-->
                                            IDR. {{ number_format(floatval($game->harga), 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <!-- game actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a href="{{ route('landing.detail', ['id' => $game->id]) }}">View
                                                Details</a>
                                            <form action="{{ route('landing.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="game_id" value="{{$game->id}}">
                                                <br>
                                                <input type="submit" class="btn btn-outline-light mt-auto"
                                                    value="Add to Cart">
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
    <!-- ***** All Item ***** -->


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

    <!-- Isotope JS -->
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/popup.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        // Membuat event listener untuk memantau perubahan pada dropdown kategori
        document.getElementById('categoryDropdown').addEventListener('change', function() {
            // Mengambil nilai kategori yang dipilih
            var categoryId = this.value;

            // Mengirim permintaan AJAX ke server
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/browse/category/' + categoryId, true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Mengupdate tampilan dengan data permainan yang baru
                        var responseData = JSON.parse(xhr.responseText);
                        updateGameList(responseData.games);
                    } else {
                        // Menangani kesalahan jika permintaan tidak berhasil
                        console.error('Error:', xhr.status);
                    }
                }
            };

            // Mengirim permintaan ke server
            xhr.send();
        });

        // Fungsi untuk memperbarui tampilan dengan data permainan yang baru
        function updateGameList(games) {
            // Temukan elemen di mana Anda ingin menampilkan data permainan, misalnya div dengan id 'gameList'
            var gameList = document.getElementById('gameList');

            // Bersihkan isi dari elemen gameList sebelum menambahkan data permainan yang baru
            gameList.innerHTML = '';

            // Loop melalui setiap permainan dan tambahkan informasi permainan ke dalam elemen gameList
            games.forEach(function(game) {
                var gameItem = document.createElement('div');
                gameItem.textContent = game.nama; // Ganti ini dengan properti yang sesuai dari objek permainan
                gameList.appendChild(gameItem);
            });
        }
    </script>

</body>

</html>
