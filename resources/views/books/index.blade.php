@extends('layouts.app')

@section('content')

<h3>Data Buku</h3>

<a href="{{ route('books.create') }}" class="btn btn-primary mb-3">
    + Tambah Buku
</a>

<table class="table table-bordered">
    <tr>
        <th>Kode</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach ($books as $book)
    <tr>
        <td>{{ $book->kode_buku }}</td>
        <td>{{ $book->judul }}</td>
        <td>{{ $book->penulis }}</td>
        <td>{{ $book->penerbit }}</td>
        <td>{{ $book->tahun_terbit }}</td>
        <td>{{ $book->stok }}</td>
    </tr>
    @endforeach

</table>

@endsection