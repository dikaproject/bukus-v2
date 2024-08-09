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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('jabatan', ['Tim Disiplin', 'Ketua Tim Disiplin', 'Guru', 'Developer']);
            $table->string('password');
            $table->string('sekolah');
            $table->enum('status', ['0', '1'])->default('0');
            $table->enum('log', ['0', '1'])->default('0');
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
        Schema::dropIfExists('admins');
    }
};
