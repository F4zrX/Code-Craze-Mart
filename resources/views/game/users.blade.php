<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Pengguna</title>
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
                    <h2>Data Costumer</h2>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th> <!-- Kolom untuk tombol aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>
                                    <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</button>
                                    </form>
                                    <form action="{{ route('user.validate', ['user' => $user->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin memvalidasi pengguna ini?')">Validasi</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data pengguna</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>
