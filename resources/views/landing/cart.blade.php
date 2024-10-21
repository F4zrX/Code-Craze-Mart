<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <img src="{{ asset('assets/images/logo.png') }}" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{ route('landing.index') }}">Home</a></li>
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
                                    @if(Auth::user()->image)
                                    <img src="{{ asset('storage/user/' . Auth::user()->image) }}"
                                        alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle">
                                    @else
                                    <img src="{{ asset('assets/images/profile.jpg') }}" alt="Default Profile Image">
                                    @endif
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
                            @if($carts->isEmpty())
                            <p>Keranjang Anda kosong.</p>
                            @else
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
                                <tbody>
                                    @foreach($carts as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('storage/image_data/' . $cart->game->image) }}"
                                                alt="{{ $cart->game->image }}" style="width: 250px; height: 100px;"
                                                class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-white">{{$cart->game->nama}}</h2>
                                        </td>
                                        <td class="h6 text-white">IDR.
                                            {{ number_format($cart->game->harga, 0, ',', '.') }}</td>
                                        <td>
                                            <select name="quantity" class="quantity" data-item="{{ $cart->id }}">
                                                @for ($i = 1; $i <= 10; $i++) <option value="{{ $i }}"
                                                    {{ $cart->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                            </select>
                                        </td>
                                        <td><span id="total-{{$cart->id}}" class="h6 text-white">IDR.
                                                {{ number_format($cart->game->harga * $cart->qty, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger ml-3 h6 text-white"
                                                onclick="deleteCartItem({{ $cart->id }})">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
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
                        <a href="{{ route('landing.browse') }}" class="btn btn-outline-white btn-sm btn-block">Lanjut
                            Belanja</a>
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
                                <span class="h5 text-white">Total Harga</span>
                            </div>
                            <div class="col-md-6 text-right">
                                @php
                                $totalPrice = 0; // Inisialisasi total harga
                                @endphp
                                @foreach ($carts as $cart)
                                @php
                                $totalPrice += $cart->game->harga * $cart->qty;
                                // Menambahkan harga total dari setiap item di keranjang
                                @endphp
                                @endforeach
                                <h4 class="h5 text-white">IDR. {{ number_format($totalPrice, 0, ',', '.') }}</h4>
                                {{-- Total harga semua item di keranjang --}}
                            </div>
                        </div>
                        <div class="row">
                            <form action="{{ route('landing.storetrans') }}" method="POST">
                                @csrf
                                <input type="submit" class="btn btn-outline-light mt-auto" value="Lanjut Bayar">
                            </form>
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
                    <p>Copyright © 2024 <a href="#">Muhammad Fazri Sidi Umar</a> Company. All rights
                        reserved.

                        <br>Design: <a href="https://templatemo.com" target="_blank"
                            title="free CSS templates">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Tiny Slider JS -->
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/js/custom1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var quantitySelects = document.querySelectorAll('.quantity');

            quantitySelects.forEach(function (select) {
                select.addEventListener('change', function (event) {
                    var itemId = select.getAttribute('data-item');
                    var newQuantity = event.target.value;

                    var csrfToken = document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content');
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '/cartup/' + itemId, true);
                    xhr.setRequestHeader('Content-Type', 'application/json');
                    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            console.log('Quantity updated successfully');
                            // Update total harga setelah perubahan jumlah barang
                            updateTotalPrice(itemId, newQuantity);
                        }
                    };
                    xhr.send(JSON.stringify({
                        quantity: newQuantity
                    }));
                });
            });

            // Fungsi untuk mengupdate total harga
            function updateTotalPrice(itemId, newQuantity) {
                var itemTotalElement = document.getElementById('total-' + itemId);
                var itemPrice = parseFloat(itemTotalElement.innerText.replace('IDR. ', '').replace(',', ''));
                var newTotalPrice = itemPrice * newQuantity;
                itemTotalElement.innerText = 'IDR. ' + newTotalPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g,
                    '$&,'); // Format total harga
            }
        });

    </script>
    <script>
        function deleteCartItem(cartId) {
            if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
              axios.delete(`/cart/${cartId}`, {
                      headers: {
                          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                      }
                  })
                .then(response => {
                    // console.log(response.data);
                    window.location.href = "{{ route('landing.cart') }}"; // Refresh halaman setelah berhasil menghapus item
                })
                .catch(error => {
                    // console.error('Error:', error);
                    // console.error('Error response:', error.response); // Tambahkan ini untuk menampilkan pesan kesalahan
                    // console.error('Request data:', error.request); // Tambahkan ini untuk menampilkan data permintaan
                    // console.error('Config:', error.config);
                    window.location.href = "{{ route('landing.cart') }}"; // Tambahkan ini untuk menampilkan konfigurasi
                });
            }
        }
    </script>
</body>

</html>
