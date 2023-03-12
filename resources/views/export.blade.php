<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>
    <table class="table text-center">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Judul</th>
                <th scope="col">Pengarang</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Dibuat Pada</th>
                <th scope="col">Diupdate Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $buku)
                <tr>
                    <td>{{ $buku->id }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun_terbit }}</td>
                    <td>{{ $buku->deskripsi }}</td>
                    <td>{{ $buku->gambar }}</td>
                    <td>{{ $buku->created_at }}</td>
                    <td>{{ $buku->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
