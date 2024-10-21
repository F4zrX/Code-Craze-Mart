
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
		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="assets/css/tiny-slider.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/fontawesome.css">
		<link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
		<link rel="stylesheet" href="assets/css/owl.css">
		<link rel="stylesheet" href="assets/css/animate.css">
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
							<li><a href="{{ route('landing.index') }}">Home</a></li>
							<li><a href="{{ route('landing.browse') }}" >Browse</a></li>
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
											<img src="{{ asset('storage/user/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle">
										@else
											<img src="{{ asset('assets/images/profile.jpg') }}" alt="Default Profile Image">
										@endif
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
		<!-- Start Isi -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-content">
						@foreach($transaksis as $key => $transaksi)
							<div class="heading-section text-center">
								<h4>Terima Kasih Telah Berbelanja</h4>
								<h2 class="h2 text-white mt-0">Barang Sudah Dikirim Ke Email Anda</h2>
								<br>
								<h5>{{ $transaksi->created_at->translatedFormat('l, d F Y') }}</h5>
							</div>
							@break {{-- Stop loop after the first iteration --}}
						@endforeach
                        <br>
                            <hr>
                            <br>
                            <div class="content-section">
								<div class="row align-items-center">
									<br>
									<br>
									<div class="col-md-6 mb-6 mb-md-0 text-center">
										<a href="https://cdn.cloudflare.steamstatic.com/client/installer/SteamSetup.exe" class="btn btn-white btn-sm btn-block" >Download Software</a>
									</div>
									<div class="col-md-6 text-center">
										<a href="{{ route('landing.browse') }}" class="btn btn-outline-white btn-sm btn-block">Lanjut Belanja</a>
									</div>
							    </div>
                            </div>        
                        </div>   
					</div>
				</div>
			</div>
		</div>
		<!---End Isi--->

		<!-- Start Footer Section -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p>Copyright © 2024 <a href="#">Muhammad Fazri Sidi Umar</a> Company. All rights reserved.
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer Section -->


		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/js/isotope.min.js"></script>
		<script src="assets/js/owl-carousel.js"></script>
		<script src="assets/js/tabs.js"></script>
		<script src="assets/js/popup.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>

</html>
