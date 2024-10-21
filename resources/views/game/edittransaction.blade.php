<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Transaksi Midtrans</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Main content -->
    <div class="main">
        <div class="container">
            <h1>Edit Data Transaksi Midtrans</h1>
            <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="user_id">User ID:</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ old('user_id', $transaction->user_id) }}">
                </div>
                <div class="form-group">
                    <label for="game_id">Game ID:</label>
                    <input type="text" class="form-control" id="game_id" name="game_id" value="{{ old('game_id', $transaction->game_id) }}">
                </div>
                <div class="form-group">
                    <label for="snap_token">Snap Token:</label>
                    <input type="text" class="form-control" id="snap_token" name="snap_token" value="{{ old('snap_token', $transaction->snap_token) }}">
                </div>
                <div class="form-group">
                    <label for="qty">Quantity:</label>
                    <input type="number" class="form-control" id="qty" name="qty" value="{{ old('qty', $transaction->qty) }}">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $transaction->status) }}">
                </div>
                <div class="form-group">
                    <label for="payment_date">Payment Date:</label>
                    <input type="datetime-local" class="form-control" id="payment_date" name="payment_date" value="{{ old('payment_date', $transaction->payment_date ? date('Y-m-d\TH:i', strtotime($transaction->payment_date)) : '') }}">
                </div>
                <div class="form-group">
                    <label for="email_sent_date">Email Sent Date:</label>
                    <input type="datetime-local" class="form-control" id="email_sent_date" name="email_sent_date" value="{{ old('email_sent_date', $transaction->email_sent_date ? date('Y-m-d\TH:i', strtotime($transaction->email_sent_date)) : '') }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
