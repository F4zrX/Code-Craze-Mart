<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Games</title>
</head>

<body>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Side navbar -->
    <div class="sidenav">
        <img style="width: 200px; margin: 0 auto;" src="/gambar/logo.png" alt="Logo">
        <a href="{{ route('game.index') }}">
            <i class="fa fa-gamepad"></i> Games
        </a>
        <a href="{{ route('game.indexslide') }}">
            <i class="fa fa-picture-o"></i> Slider
        </a>
        <a href="{{ route('game.kindex') }}">
            <i class="fa fa-list"></i> Kategori
        </a>
        <a href="{{ route('game.orderPages') }}">
            <i class="fa fa-paper-plane"></i> Transaksi
        </a>
        <a href="{{ route('admin.users') }}">
            <i class="fa  fa-users"></i> Data User
        </a>    
        <a href="{{ route('logoutL') }}">
            <i class="fa fa-sign-out"></i> Logout
        </a>
    </div>
    <!-- Main content -->
    <div class="main">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <!-- Tambahkan pesan sukses data ditambahkan -->
                        @if (session('dataAdded'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('dataAdded') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <!-- Tambahkan pesan sukses data dihapus -->
                        @if (session('dataDeleted'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('dataDeleted') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    <div class="py-4 d-flex justify-content-end align-items-center">
                        <h2 class="mr-auto">Store</h2>
                        <a href="{{ route('games.create') }}" class="btn btn-primary">
                            Tambah Data
                        </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Image</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Platform</th>
                                <th>Rating</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($games as $game)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td><a href="{{ route('games.show',['game' =>$game->id]) }}">{{$game->nama}}</a></td>
                                <td>
                                    <img src="{{ asset('storage/image_data/'.$game->image) }}" alt=""
                                        style="max-width: 50px">
                                </td>
                                <td>{{ $game->kategori ? $game->kategori->name : 'Tidak ada kategori' }}</td>
                                <td>{{ number_format($game->harga, 0, ',', '.') }}</td>
                                <td>{{$game->platform}}</td>
                                <td>{{$game->rating}}</td>
                                <td>{{ Str::limit($game->deskripsi, 200) }}</td>
                            </tr>
                            @empty
                            <td colspan="6" class="text-center">Tidak ada data</td>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination links -->
                    <div class="d-flex justify-content-between">
                        @if ($games->previousPageUrl())
                        <a href="{{ $games->previousPageUrl() }}" class="btn btn-primary">Previous</a>
                        @else
                        <a class="btn btn-secondary disabled">Previous</a>
                        @endif

                        @if ($games->nextPageUrl())
                        <a href="{{ $games->nextPageUrl() }}" class="btn btn-primary">Next</a>
                        @else
                        <a class="btn btn-secondary disabled">Next</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
