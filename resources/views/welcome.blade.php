@extends('layouts.app')

@section('title','Welcome!!')
@section('content')
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Selamat Datang di Situs Perpustakaan Online</h1>
      <p class="lead">Temukan berbagai buku dan artikel menarik untuk dibaca.</p>
      <hr class="my-4">
      <p>Website ini menyediakan koleksi buku dan artikel dalam berbagai kategori, lengkap dengan deskripsi dan informasi peminjaman.</p>
      <a class="btn btn-primary btn-lg" href="/buku" role="button">Lihat Koleksi Buku</a>
    </div>
  </div>
@endsection
