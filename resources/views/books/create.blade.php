@extends('layouts.app')

@section('content')

<h3>Tambah Buku</h3>

<form action="{{ route('books.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Kode Buku</label>
        <input type="text" name="kode_buku" class="form-control">
    </div>

    <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control">
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control">
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">
        Simpan
    </button>

</form>

@endsection