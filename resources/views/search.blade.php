@extends('layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
    <h1>Hasil Pencarian</h1>

    <div class="row">
        @if ($books->count() > 0)
            @foreach ($books as $book)
                <div class="col-md-4 mb-3">
                    <div class="card" onclick="window.location='{{ route('buku.show', $book->id) }}';" style="cursor: pointer;">
                        <img class="card-img-top" src="{{ asset('storage/' . $book->gambar) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->judul }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Tidak ditemukan data yang sesuai dengan kata kunci "{{ request('query') }}".</p>
        @endif
    </div>
@endsection
