<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi Midtrans</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="container">
            <h1>Data Transaksi Midtrans</h1>
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
                        <th>Order ID</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Nama Game</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Tanggal Email Dikirim</th>
                        <th>Aksi</th> <!-- Kolom untuk aksi -->
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->order_id }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->user->email }}</td>
                        <td>{{ $transaction->game->nama }}</td>
                        <td>{{ number_format($transaction->game->harga, 0, ',', '.') }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->payment_date ? \Carbon\Carbon::parse($transaction->payment_date)->format('d-m-Y H:i') : '-' }}</td>
                        <td>{{ $transaction->email_sent_date ? \Carbon\Carbon::parse($transaction->email_sent_date)->format('d-m-Y H:i') : '-' }}</td>
                        <td>
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transactions.delete', $transaction->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada data</td> <!-- Kolom yang diupdate sesuai jumlah kolom baru -->
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
