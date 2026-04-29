@foreach ($books as $book)

<div class="card mb-3 p-3">

    <h4>{{ $book->judul }}</h4>

    <p>Penulis: {{ $book->penulis }}</p>

    <p>
        Stok tersedia:
        <b>{{ $book->stok }}</b>
    </p>

    <form action="{{ route('siswa.transactions.store') }}" method="POST">
        @csrf

        <input type="hidden" name="book_id" value="{{ $book->id }}">

        <input type="date" name="tanggal_pinjam" required>
        <input type="date" name="tanggal_jatuh_tempo" required>
        
        @if ($book->stok > 0)
            <button type="submit" class="btn btn-primary">
                Pinjam
            </button>
        @else
            <button class="btn btn-secondary" disabled>
                Stok Habis
            </button>
        @endif

    </form>

</div>

@endforeach