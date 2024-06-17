<?php

use App\Models\Guests;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->char('idTransaksi', 10);
            $table->char('idTamu', 10);
            $table->char('idKamar', 10);
            $table->date('tglMasuk', 'Y-m-d');
            $table->date('tglKeluar', 'Y-m-d');
            $table->decimal('totalHarga', 10, 2);
            $table->primary('idTransaksi');
            $table->timestamps();

            $table->foreign('idTamu')->references('idTamu')->on('guests')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idKamar')->references('idKamar')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
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
