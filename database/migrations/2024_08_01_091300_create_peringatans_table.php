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
        Schema::create('peringatans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis');
            $table->string('nama');
            $table->integer('tpoin');
            $table->date('tanggal');
            $table->string('kode_id');
            $table->string('aksi');
            $table->string('timdis');
            $table->enum('status', ['0', '1']);
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
        Schema::dropIfExists('peringatans');
    }
};
