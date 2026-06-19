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
            $table->foreignId('id_lokasi')->constrained('locations')->cascadeOnDelete();
            $table->string('no_tiket', 255);
            $table->string('no_polisi', 15);
            $table->foreignId('id_jenis')->constrained('vehicle_types')->cascadeOnDelete();
            $table->dateTime('masuk');
            $table->dateTime('keluar')->nullable();
            $table->integer('perjam_pertama');
            $table->integer('perjam_berikutnya');
            $table->integer('max_perhari');
            $table->integer('total_jam');
            $table->integer('total_bayar');
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
