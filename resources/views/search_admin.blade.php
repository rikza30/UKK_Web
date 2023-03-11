@extends('layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
    <h1>Hasil Pencarian</h1>

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
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->judul }}</td>
                        <td>{{ $book->pengarang }}</td>
                        <td>{{ $book->penerbit }}</td>
                        <td><img src="{{ asset('storage/' . $book->gambar) }}" width="100"></td>
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
        <p>Tidak ditemukan data yang sesuai dengan kata kunci "{{ request('query') }}".</p>
    @endif
@endsection
