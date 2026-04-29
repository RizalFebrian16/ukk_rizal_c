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
        Schema::table('users', function (Blueprint $table) {

            $table->string('rayon')
                  ->nullable()
                  ->after('role');

            $table->string('rombel')
                  ->nullable()
                  ->after('rayon');

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('rayon');
            $table->dropColumn('rombel');

        });
    }
};