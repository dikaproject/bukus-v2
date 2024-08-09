<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pesans', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 30);
            $table->string('jenis', 15);
            $table->string('tentang', 35);
            $table->string('isi');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('pembuat')->nullable();
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
        Schema::dropIfExists('pesans');
    }
};
