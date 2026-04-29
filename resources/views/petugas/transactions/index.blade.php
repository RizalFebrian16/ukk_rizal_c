@foreach ($transactions as $t)

<table class="table table-bordered">

    <tr>
        <td>{{ $t->book->judul }}</td>
        <td>{{ $t->status }}</td>

        <td>
            @if ($t->status == 'pending')
                <form action="{{ route('petugas.transactions.acc', $t->id) }}" method="POST">
                    @csrf
                    <button type="submit">ACC</button>
                </form>
            @endif
        </td>
    </tr>

</table>

@endforeach