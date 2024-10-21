<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Pendataan Game</title>
</head>

<body>
    <div class="container pt-4 bg-white">
        <div class="row">
                    <a href="http://127.0.0.1:8000/games"><img style="width: 100px" src="/gambar/logo.png"></a>
            <div class="col-md-8 col-xl-6">
                <h1>Pendataan Game</h1>
                <hr>
                <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>

                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }} ">@error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                       <div class="form-group">
                        <label for="harga">Harga</label>

                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }} ">

                        @error('harga')
                        <div class="text-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="platform">Platform</label>

                        <input type="text" class="form-control @error('platform') is-invalid @enderror" id="platform" name="platform" value="{{ old('platform') }} ">

                        @error('platform')
                        <div class="text-danger">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>

                        <input type="text" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating') }} ">

                        @error('rating')
                        <div class="text-danger">{{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>

                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }} " cols="30" rows="10"></textarea>

                        @error('deskripsi')
                        <div class="text-danger">{{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Image</label>

                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">

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
