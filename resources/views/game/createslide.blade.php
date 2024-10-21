<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Upload Slider</title>
</head>

<body>
    <div class="container pt-4 bg-white">
        <div class="row">
                <a href="http://127.0.0.1:8000/games"><img style="width: 100px" src="/gambar/logo.png"></a>
            <div class="col-md-8 col-xl-6">
                <h1>Upload sliderr</h1>
                <hr>
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nama</label>

                        <input type="title" class="form-control @error('nama') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }} ">@error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>

                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                            name="image">

                        @error('image')
                        <div class="text-danger">{{ $message }} </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mb-2">Input</button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
