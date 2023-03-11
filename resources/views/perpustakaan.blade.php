@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($book as $buku)
                <div class="col-md-3">
                    <div class="card mb-3">
                        <img src="{{ asset('storage/' . $buku->gambar) }}" class="card-img-top" alt="{{ $buku->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $buku->judul }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
