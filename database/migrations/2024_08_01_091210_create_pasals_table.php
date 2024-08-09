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
        Schema::create('pasals', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('kategori');
            $table->string('kode');
            $table->string('poin');
            $table->longText('keterangan');
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
        Schema::dropIfExists('pasals');
    }
};
