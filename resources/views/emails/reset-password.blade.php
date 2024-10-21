<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>

<body>
    <h2>Reset Password</h2>
    <p>Hai {{ $name }},</p>
    <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>
    <p>Silakan klik link di bawah ini untuk mereset password Anda:</p>
    <p><a href="{{ route('reset.password', $token) }}">Reset Password</a></p>
    <p>Jika Anda tidak meminta reset password, Anda dapat mengabaikan email ini.</p>
    <p>Terima kasih.</p>
</body>

</html>
