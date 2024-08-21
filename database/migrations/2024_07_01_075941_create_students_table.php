<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nis')->unique();
            $table->string('name');
            $table->date('tanggal')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('angkatan');
            $table->string('sekolah');
            $table->string('tpoin')->nullable();
            $table->string('aksi')->nullable();
            $table->string('pesan')->nullable();
            $table->integer('bintang')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('token')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
