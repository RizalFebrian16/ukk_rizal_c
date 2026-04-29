<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {

            $table->id();

            /*
            RELASI USER (SISWA)
            */

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            /*
            RELASI BUKU
            */

            $table->foreignId('book_id')
                  ->constrained()
                  ->cascadeOnDelete();

            /*
            TANGGAL
            */

            $table->date('tanggal_pinjam');

$table->date('tanggal_jatuh_tempo');

$table->date('tanggal_pengembalian')
      ->nullable(); // tetap nullable karena diisi saat pengembalian
            /*
            STATUS TRANSAKSI
            */

            $table->enum('status', [
                'pending',      // menunggu ACC
                'disetujui',    // sudah di ACC
                'ditolak',      // ditolak
                'dipinjam',     // sedang dipinjam
                'kembali'       // sudah dikembalikan
            ])->default('pending');

            /*
            KONDISI BUKU
            */

            $table->enum('kondisi_buku', [
                'baik',
                'rusak',
                'hilang'
            ])->default('baik');

            /*
            DENDA
            */

            $table->integer('denda')
                  ->default(0);

            /*
            TIMESTAMP
            */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};