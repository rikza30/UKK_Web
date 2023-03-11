@extends('layouts.app')

@section('title','Daftar Buku')
@section('content')
@if ($books->count() > 0)
<div class="container">
    <div class="row">
        @foreach ($books as $buku)
            <div class="col-md-3">
                <div class="card mb-3" onclick="window.location='{{ route('buku.show', $buku->id) }}';" style="cursor: pointer;">
                    <img src="{{ asset('storage/' . $buku->gambar) }}" class="card-img-top" alt="{{ $buku->judul }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $buku->judul }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@else
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><strong> Buku Belum Tersedia</strong></h5>
        <p class="card-text">Silakan cek kembali nanti untuk melihat daftar buku yang tersedia.</p>
    </div>
</div>
@endif

@endsection
