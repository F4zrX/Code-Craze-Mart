<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .chat-box {
            max-height: 500px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
        }
        .message p {
            margin: 0;
        }
        .message.text-right {
            background-color: #007bff;
            color: #fff;
            text-align: right;
        }
        .message.text-left {
            background-color: #f2f2f2;
            color: #000;
            text-align: left;
        }
        .message small {
            font-size: 12px;
            color: #666;
        }
        .form-group textarea {
            resize: none;
            border-radius: 5px;
            padding: 10px;
        }
        .form-group button {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Chat with {{ Auth::user()->role->name == 'admin' ? 'Users' : 'Admin' }}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="chat-box">
                @foreach ($messages as $message)
                    <div class="message @if($message->is_admin) text-right @else text-left @endif">
                        <strong>{{ $message->is_admin ? 'Admin' : 'User' }}:</strong>
                        <p>{{ $message->message }}</p>
                        <small>{{ $message->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('chat.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="message" class="form-control" rows="3" placeholder="Type your message here..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
