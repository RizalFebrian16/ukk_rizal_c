<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'tanggal_pinjam',
        'tanggal_jatuh_tempo',
        'tanggal_pengembalian',
        'status',
        'denda'
    ];

    /*
    Relasi ke User (Siswa)
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    Relasi ke Book
    */

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}