<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <title>Edit Data</title>
</head>

<body>
  <div class="container pt-4 bg-white">
    <div class="row">
            <a href="http://127.0.0.1:8000/games"><img style="width: 100px" src="/gambar/logo.png"></a>
      <div class="col-md-8 col-xl-6">
        <h1>Edit Data</h1>
        <hr>
        <form action="{{ route('games.update',['game' => $game->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf  
        @method('PATCH') 
          <div class="form-group">
            <label for="nim">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $game->nama}}">
            @error('nama')
            <div class="text-danger">{{ $message}}</div>
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
            <label for="harga">harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') ?? $game->harga }}">
            @error('harga')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>


          <div class="form-group">
            <label for="platform">platform</label>
            <input type="text" class="form-control @error('platform') is-invalid @enderror" id="platform" name="platform" value="{{ old('platform') ?? $game->platform }}">
            @error('platform')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="rating">rating</label>
            <input type="text" class="form-control @error('rating') is-invalid @enderror" id="rating" name="rating" value="{{ old('rating') ?? $game->rating }}">
            @error('rating')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>

                        <textarea class="form-control @error('rating') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi')  ?? $game->deskripsi }} " cols="30" rows="10"></textarea>

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

          <button type="submit" class="btn btn-primary mb-2">Update</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>