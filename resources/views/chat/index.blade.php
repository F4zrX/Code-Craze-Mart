<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            width: 100%;
        }
        .chat-box {
            max-height: 500px;
            overflow-y: auto;
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
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Chat') }}</div>
        <div class="card-body">
            <div class="chat-box">
                @foreach ($messages as $message)
                    <div class="message @if($message->user_id === Auth::id() || $message->admin_id === Auth::id()) text-right @else text-left @endif">
                        <strong>{{ $message->is_admin ? 'Admin' : 'You' }}:</strong>
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
