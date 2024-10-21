<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Kategori</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
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
                    <div class="py-4 d-flex justify-content-end align-items-center">
                        <h2 class="mr-auto">List Kategori</h2>
                        <a href="{{ route('game.kategori.kcreate') }}" class="btn btn-primary mb-3">Tambah Kategori Baru</a>
                    </div>
                    @if (session('dataAdd'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('dataAdd') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session('dataDeleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('dataDeleted') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form action="{{ route('kategori.kdelete', ['id' => $category->id]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
