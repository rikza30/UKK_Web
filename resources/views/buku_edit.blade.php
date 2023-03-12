@extends('layouts.app')

@section('title','Edit Buku')
@section('content')
@if (auth()->user()->role == "admin")
<div class="container mt-4">
    <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}" required>
        </div>
    
        <div class="form-group">
            <label for="pengarang">Pengarang:</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $buku->pengarang }}" required>
        </div>
    
        <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}" required>
        </div>
    
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required>
        </div>
    
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ $buku->deskripsi }}</textarea>
        </div>
    
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
        </div>
    
        <button type="submit" class="btn btn-primary">Update</button>
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
