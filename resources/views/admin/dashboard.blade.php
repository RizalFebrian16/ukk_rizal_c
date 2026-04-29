@extends('layouts.app')

@section('content')

<h2 class="mb-4">Dashboard Admin</h2>

<div class="row">

    <!-- TOTAL BUKU -->
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>Total Buku</h5>
                <h3>{{ \App\Models\Book::count() }}</h3>
            </div>
        </div>
    </div>

    <!-- TOTAL TRANSAKSI -->
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>Transaksi</h5>
                <h3>{{ \App\Models\Transaction::count() }}</h3>
            </div>
        </div>
    </div>

    <!-- SISWA PINJAM -->
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5>Sedang Dipinjam</h5>
                <h3>{{ \App\Models\Transaction::where('status','dipinjam')->count() }}</h3>
            </div>
        </div>
    </div>

</div>

<hr>

<!-- MENU CEPAT -->
<div class="mt-3">

    <a href="/admin/books" class="btn btn-primary">
        📚 Kelola Buku
    </a>

    <a href="/admin/transactions" class="btn btn-success">
        🔄 Transaksi
    </a>

</div>

@endsection