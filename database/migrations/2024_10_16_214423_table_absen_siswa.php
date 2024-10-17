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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('siswa');
            $table->integer('nis');
            $table->enum('jenis_absen',['Kedatangan','Ketelatan']);
            $table->string('jam');
            $table->string('rayon');
            $table->string('rombel');
            $table->timestamps();
        });
    }

    /**$table->name('siswa');
    /**$table->name('siswa');
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
