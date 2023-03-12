@extends('layouts.app')

@section('title','Data Buku')
@section('content')
    {{-- untuk memelakukan print report --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
        <a href="{{route('export')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Print Report</a>
        
    </div>  
    @if (auth()->user()->role == "admin")

        @if ($books->count() > 0)
        <table class="table text-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $i => $book)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->pengarang }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td><img src="{{ asset('storage/' . $book->gambar) }}" width="100" style="border-radius: 5%;"></td>
                    <td>
                        <a href="{{ route('buku.edit', $book->id) }}" class="btn btn-primary mb-1">Edit</a>
                        <form action="{{ route('buku.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-text"><strong> Buku Belum Tersedia</strong></h5>
            </div>
        </div>
        @endif
        @if(session('success'))
            <div class="card mb-4">
                <div class="card-body">
                    {{ session('success') }}
                </div>
            </div>
        @elseif(session('error'))
            <div class="card mb-4">
                <div class="card-body">
                    {{ session('error') }}
                </div>
            </div>
        @endif       
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('buku.create') }}'">Tambah Buku</button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/pdf') }}'">Print PDF</button>
    @elseif (auth()->user()->role == "user")

        <div class="container">
            <div class="jumbotron">
            <h1 class="display-4">Selamat Datang di Situs Perpustakaan Online</h1>
            <p class="lead">Temukan berbagai buku dan artikel menarik untuk dibaca.</p>
            <hr class="my-4">
            <p>Website ini menyediakan koleksi buku dan artikel dalam berbagai kategori, lengkap dengan deskripsi dan informasi peminjaman.</p>
            <a class="btn btn-primary btn-lg" href='buku' role="button">Lihat Koleksi Buku</a>
            </div>
        </div>
    @endif

@endsection
