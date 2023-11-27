<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksesorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksesoris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('kode');
            $table->string('jenis_aksesoris');
            $table->string('merek');
            $table->string('tahun_perolehan');
            $table->text('harga_perolehan');
            $table->string('masa_guna');
            $table->string('lama_pakai');
            $table->text('kondisi');
            $table->string('lokasi');
            $table->text('pengguna')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aksesoriss');
    }
}
