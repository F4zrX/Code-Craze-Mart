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
      <div class="col-md-8 col-xl-6">
        <h1>Edit Data</h1>
        <hr>
        <form action="{{ route('user.update', ['user' => $user->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $user->name }}">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $user->email }}">
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
              <option value="user" {{ $user->role->name == 'user' ? 'selected' : '' }}>User</option>
              <option value="admin" {{ $user->role->name == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <!-- Tambahkan kolom lain jika diperlukan -->

          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
