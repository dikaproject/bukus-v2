<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('poins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nis');
            $table->foreign('nis')->references('nis')->on('students')->onDelete('cascade');
            $table->string('nama');
            $table->string('kelas');
            $table->string('kode');
            $table->string('jenis');
            $table->string('pelanggaran');
            $table->integer('poin');
            $table->enum('konfirmasi', ['Benar', 'Salah', 'Belum']);
            $table->string('bukti');
            $table->enum('status_bukti', ['Belum', 'Sudah'])->default('Belum');
            $table->date('tanggal');
            $table->string('pelapor');
            $table->string('pesan')->nullable();
            // Add your columns here
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('poins');
    }
};
