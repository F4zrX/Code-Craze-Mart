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
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Search End ***** -->
                    <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div>
                    <!-- ***** Search End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('landing.index') }}">Home</a></li>
                        <li><a href="{{ route('landing.browse') }}">Browse</a></li>
                        @auth
                            <li><a href="{{ route('landing.cart', ['id' => Auth::id()]) }}">Cart</a></li>
                        @else
                            <li><a href="{{ route('landing.history') }}">Cart</a></li>
                        @endauth
                        <li><a href="{{ route('landing.wishlist') }}">Wishlist</a></li>
                        <li>
                            <a href="{{ route('landing.profile') }}" class="active">
                                Profile 
                                @if(Auth::user()->image)
                                    <img src="{{ asset('storage/user/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle" >
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
  <!-- ***** Header Area End ***** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <div class="col-lg-4">
                  @if (Auth::user()->image == null)
                  <img src="assets/images/profile.jpg" alt="" style="border-radius: 23px; width: 300px; height: 300px;">
                   @else
                  <img class="photo" src="{{ asset('storage/user/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" style="border-radius: 23px; width: 300px; height: 300px;">
                  @endif
                  </div>
                  <div class="col-lg-4 align-self-center">
                  @if(session('success'))
                      <div class="alert alert-success mt-3">
                          {{ session('success') }}
                      </div>
                  @endif
                    <div class="main-info header-text">
                      @auth
                      <h4>{{ Auth::user()->name }}</h4>
                      <p>Selamat datang dan selamat berbelanja di Code Craze Mart</p>
                      <div class="main-border-button">
                        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            @method('patch')
                          <input type="file" name="image">
                          <br>
                          <br>
                          <button type="submit" class="btn btn-outline-light mt-auto">Update Profile</button>
                        </form>
                      </div>
                      @endauth
                    </div>
                  </div>
                  <!-- Tampilkan pesan flash -->
                  <div class="col-lg-4 row align-items-center">
                    <ul>
                      <h2 class="h5 text-white ">Total Pengeluaran</h2>
                      <br>
                      <li>IDR. {{ number_format($totalPengeluaran) }}</li>
                    </ul>
                  </div>
                  <form action="{{ route('logout') }}" method="post">
                    <br>
                      @csrf {{-- Tambahkan csrf token untuk keamanan --}}
                      <button type="submit" class="btn btn-outline-light mt-auto">Log-Out</button>
                  </form>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="clips">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="heading-section">
                            <h4><em></em> History</h4>
                          </div>
                        </div>
                        <!-- Mengambil data Transaksi -->
                        <div class="after">
                            <!-- Tambahkan event onclick untuk setiap button -->
                            <input type="button" value="All" class="btn btn-outline-light mt-auto" onclick="filterItems('ALL')">
                            <input type="button" value="Belum Dibayar" class="btn btn-outline-light mt-auto" onclick="filterItems('Belum Dibayar')">
                            <input type="button" value="Pending" class="btn btn-outline-light mt-auto" onclick="filterItems('PENDING')">
                            <input type="button" value="Paid" class="btn btn-outline-light mt-auto" onclick="filterItems('PAID')">
                        </div>

                        <br>
                        <br>
                        <div class="col-lg-12">
                            <ul class="list-group list-group-black" id="listBarang">
                                @foreach($transactions as $transaction)
                                    <li class="list-group-item" data-status="{{ $transaction->status }}">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="his">
                                                    @if ($transaction->game && $transaction->game->image)
                                                        <img src="{{ asset('storage/image_data/' . $transaction->game->image) }}" alt="{{ $transaction->game->nama }}">
                                                    @else
                                                        <!-- Tampilkan pesan alternatif jika properti 'image' tidak ada -->
                                                        <span>Image not available</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="down-content">
                                                    <!-- Tampilkan nama produk hanya jika 'game' dan 'nama' ada -->
                                                    <h4>{{ $transaction->game ? $transaction->game->nama : 'Nama Produk Tidak Tersedia' }}</h4>
                                                    <p><i class="fa fa-calendar"></i> {{ $transaction->created_at->format('d/m/Y') }}</p>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <button class="btn btn-outline-light mt-auto" onclick="showModal(
                                                        '{{ $transaction->id }}', 
                                                        '{{ $transaction->game ? $transaction->game->nama : 'Nama tidak tersedia' }}', 
                                                        '{{ $transaction->created_at->format('d/m/Y H:i:s') }}', 
                                                        '{{ $transaction->order_id }}', 
                                                        '{{ $transaction->game ? $transaction->game->image : 'image-tidak-tersedia.jpg' }}', 
                                                        '{{ $transaction->qty }}', 
                                                        '{{ $transaction->game ? number_format($transaction->game->harga, 0, ',', '.') : '0' }}', 
                                                        '{{ $transaction->game ? number_format($transaction->game->harga * $transaction->qty, 0, ',', '.') : '0' }}', 
                                                        '{{ auth()->user()->name }}', 
                                                        '{{ auth()->user()->email }}')">
                                                        Detail 
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-1 text-right"> <!-- Ubah class agar status berada di sebelah kanan -->
                                                <div class="status">
                                                    <p class="h5 text-white">{{ $transaction->status }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title modal-title-black" id="detailModalLabel">Detail Pembelian</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Konten modal diisi oleh JavaScript -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Beli Lagi</button>
                                        <button type="button" class="btn btn-info" onclick="sendEmail()">Hubungi Email</button>
                                        <button type="button" class="btn btn-info" onclick="window.location.href='{{ route('chat.index') }}'">Bantuan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->
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
  </body>
  <script>
      function showModal(transactionId, gameNama, tanggalPembelian, orderID, gambar, qty, harga, totalHarga, namaUser, emailUser, randomString) {
          console.log('Harga:', harga);  // Debugging statement
          $('#detailModal').modal('show');
          $('#detailModal .modal-body').html(`
              <p><strong>Order ID:</strong> ${orderID}</p>
              <p><strong>Tanggal Pembelian:</strong> ${tanggalPembelian}</p>
              <hr>
              <h5 style="color: rgb(58, 58, 58);">Detail Produk:</h5>
              <div class="row">
                  <div class="col-lg-3">
                      <img src="{{ asset('storage/image_data/') }}/${gambar}" alt="${gameNama}" class="img-fluid">
                  </div>
                  <div class="col-lg-9">
                      <p><strong>Nama Produk:</strong> ${gameNama}</p>
                      <p><strong>Qty:</strong> ${qty}</p>
                      <p><strong>Harga:</strong> ${harga}</p>
                      <p><strong>Total Harga:</strong> ${totalHarga}</p>
                  </div>
              </div>
              <hr>
              <p><strong>Nama :</strong> ${namaUser}</p>
              <p><strong>Email:</strong> ${emailUser}</p>
          `);
      }
  </script>

  <script>
      function sendEmail() {
          // Definisikan email tujuan
          var emailTujuan = 'codecrazemart@gmail.com';
          // Definisikan subject email
          var subject = 'Pertanyaan/Pesan untuk Codecraze Mart';

          // Buat link email
          var link = 'mailto:' + emailTujuan + '?subject=' + subject;

          // Redirect ke halaman email dengan email tujuan dan subject yang sudah terisi
          window.location.href = link;
      }
  </script>
  <script>
        // Fungsi untuk melakukan filter berdasarkan status
        function filterItems(status) {
            // Ambil semua list item
            var items = document.querySelectorAll('.list-group-item');

            // Iterasi semua list item
            items.forEach(function(item) {
                // Ambil status dari data-status pada list item
                var itemStatus = item.getAttribute('data-status');

                // Tentukan apakah status sesuai dengan filter
                if (status === 'ALL' || itemStatus.toUpperCase() === status.toUpperCase()) {
                    // Tampilkan item yang sesuai dengan status atau tampilkan semua jika ALL
                    item.style.display = 'block';
                } else {
                    // Sembunyikan item yang tidak sesuai dengan status
                    item.style.display = 'none';
                }
            });
        }
    </script>



</html>
