<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Mengimpor stylesheet bootstrap-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Game {{$game->nama}}</title>
</head>

<body>
    <!-- Container utama -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
            <div class="py-4 d-flex justify-content-end align-items-center">
             <!-- Tautan kembali ke halaman utama -->       
            <a href="http://127.0.0.1:8000/games"><img style="width: 100px" src="/gambar/logo.png"></a>
        <!-- Judul halaman -->
        <h1 class="h2 mr-auto">Details {{$game->nama}}</h1>
        <!-- Tombol Edit -->
        <a href="{{ route('games.edit',['game' => $game->id]) }}"
            class="btn btn-primary">Edit</a>
             <!-- Formulir untuk menghapus data -->
            <form action="{{ route('games.destroy',['game'=>$game->id])}}"method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger ml-3">Hapus</button>
        </form>
                </div>
                <hr>

                <!-- Menampilkan pesan sukses jika ada -->
                {{-- class="btn btn-primary">Edit</a> --}}
                {{-- </div><hr> --}}
                @if (session('dataEdit'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('dataEdit') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <!-- Card untuk detail game -->
                    <div class="col-md-6 order-md-2">
                        <div class="card">
                            <div class="card-header">Detail</div>
                            <div class="card-body">
                                <ul>
                                    <li>Nama : {{$game->nama}} </li>
                                    <li>Kategori : {{ $game->kategori ? $game->kategori->name : 'Tidak ada kategori' }} </li>
                                    <li>Harga : {{ number_format($game->harga, 0, ',', '.') }} </li>
                                    <li>Platform : {{$game->platform}} </li>
                                    <li>Rating : {{$game->rating}} </li>
                                    <li>Description : {{$game->deskripsi}} </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Card untuk gambar -->
                    <div class="col-md-6 order-md-1">
                        <div class="card">
                            <div class="card-header">Game Image</div>
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/image_data/'.$game->image) }}" alt="Game Image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
