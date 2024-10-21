<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Verifikasi Email</h1>
        <p>Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.</p>
        <p>Jika Anda tidak menerima email, klik tombol di bawah untuk mengirim ulang email verifikasi.</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-primary">Kirim Ulang Email Verifikasi</button>
        </form>
    </div>
</body>
</html>
