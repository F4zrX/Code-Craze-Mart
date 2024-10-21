<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
</head>
<body>
    <h1>Search Result</h1>
    <ul>
        @foreach($games as $game)
            <li>{{ $game->nama }}</li>
        @endforeach
    </ul>
</body>
</html>
