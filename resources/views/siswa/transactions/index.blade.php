@extends('layouts.app')

@section('content')

<h3>Riwayat Peminjaman Saya</h3>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($transactions as $t)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $t->book->judul }}</td>
            <td>{{ $t->tanggal_pinjam ?? '-' }}</td>
            <td>{{ $t->tanggal_jatuh_tempo ?? '-' }}</td>
            <td>
                @if ($t->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                @elseif ($t->status == 'dipinjam')
                    <span class="badge bg-primary">Dipinjam</span>
                @elseif ($t->status == 'kembali')
                    <span class="badge bg-success">Kembali</span>
                @elseif ($t->status == 'ditolak')
                    <span class="badge bg-danger">Ditolak</span>
                @endif
            </td>
            <td>
    @if ($t->status == 'dipinjam')
        <form action="{{ route('siswa.transactions.return', $t->id) }}" method="POST">
            @csrf
            <button class="btn btn-warning btn-sm">
                Kembalikan
            </button>
        </form>
    @else
        <span class="badge bg-success">
            {{ ucfirst($t->status) }}
        </span>
    @endif
</td>
        </tr>
        @endforeach
    </tbody>

</table>

@endsection