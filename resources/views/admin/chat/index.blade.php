<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>User Chats</title>
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
        <a href="{{ route('admin.chat.index') }}">
            <i class="fa fa-comments"></i> Laporan
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
                    <h1>User Chats</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td><a href="{{ route('admin.chat.show', $user->id) }}">{{ $user->name }}</a></td>
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
