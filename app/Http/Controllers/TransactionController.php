<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /*
    =========================
    ADMIN - LIHAT SEMUA TRANSAKSI
    =========================
    */
    public function indexAdmin()
    {
        $transactions = Transaction::with(['user', 'book'])->get();

        return view('admin.transactions.index', compact('transactions'));
    }

    /*
    =========================
    PETUGAS - LIHAT SEMUA PENGAJUAN
    =========================
    */
    public function indexPetugas()
    {
        $transactions = Transaction::with(['user', 'book'])->get();

        return view('petugas.transactions.index', compact('transactions'));
    }

    /*
    =========================
    SISWA - LIHAT TRANSAKSI SENDIRI
    =========================
    */
   public function indexSiswa()
{
    $transactions = Transaction::with('book')
        ->where('user_id', auth()->id())
        ->get();

    return view('siswa.transactions.index', compact('transactions'));
}

    /*
    =========================
    SISWA - AJUKAN PINJAM
    =========================
    */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_jatuh_tempo' => 'required|date|after_or_equal:tanggal_pinjam',
            
        ]);

        Transaction::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pengajuan berhasil dikirim');
    }

    /*
    =========================
    PETUGAS - ACC PINJAMAN
    =========================
    */
  public function acc($id)
{
    $trx = Transaction::findOrFail($id);

    $book = $trx->book;

    // cek stok
    if ($book->stok <= 0) {
        return back()->with('error', 'Stok buku habis');
    }

    // update transaksi
    $trx->update([
        'status' => 'dipinjam'
    ]);

    // kurangi stok
    $book->decrement('stok');

    return back()->with('success', 'Buku berhasil dipinjamkan');
}

public function return($id)
{
    $trx = Transaction::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    if ($trx->status !== 'dipinjam') {
        return back()->with('error', 'Buku tidak bisa dikembalikan');
    }

    $book = $trx->book;

    // update transaksi
    $trx->update([
        'status' => 'kembali',
        'tanggal_pengembalian' => now()
    ]);

    // tambah stok lagi
    $book->increment('stok');

    return back()->with('success', 'Buku berhasil dikembalikan');
}
}