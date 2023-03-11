<!-- buku_detail.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
        <img src="{{ asset('storage/'.$book->gambar) }}" alt="{{ $book->judul }}" class="img-fluid" style="border-radius: 2%;">
    </div>
    <div class="col-md-6">
      <h1><strong>{{ $book->judul }}</strong></h1>
      <p><strong>Pengarang:</strong> {{ $book->pengarang }}</p>
      <p><strong>Penerbit:</strong> {{ $book->penerbit }}</p>
      <p><strong>Tahun Terbit:</strong> {{ $book->tahun_terbit }}</p>
      <p><strong>Deskripsi:</strong> {{ $book->deskripsi }}</p>
    </div>
  </div>
</div>
@endsection
