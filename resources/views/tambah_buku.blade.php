@extends('layouts.app')

@section('title','Tambah Buku')
@section('content')
@if (auth()->user()->role == "admin")
<div class="container mt-4">
    <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="judul">Judul Buku:</label>
            <input type="text"  class="form-control"  id="judul" name="judul" value="{{ old('judul') }}" required>
        </div>
        <div>
            <label for="pengarang">Pengarang:</label>
            <input type="text"  class="form-control"  id="pengarang" name="pengarang" value="{{ old('pengarang') }}" required>
        </div>
        <div>
            <label for="penerbit">Penerbit:</label>
            <input type="text"  class="form-control"  id="penerbit" name="penerbit" value="{{ old('penerbit') }}" required>
        </div>
        <div>
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="text"  class="form-control"  id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" required>
        </div>
        <div>
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi"  class="form-control"  name="deskripsi" required>{{ old('deskripsi') }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <div class="custom-file">
                <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@elseif (auth()->user()->role == "user")
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Maaf, terjadi kesalahan: </h1>
            <p class="lead">Anda tidak memiliki akses ke fitur ini.</p>
    <hr class="my-4">
        <a class="btn btn-primary btn-lg" href='/buku' role="button">Kembali</a>
    </div>
</div>
    
@endif
    
@endsection
