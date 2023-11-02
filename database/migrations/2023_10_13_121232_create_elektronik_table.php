<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElektronikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elektroniks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('kode');
            $table->string('tipe');
            $table->string('jenis_elektronik');
            $table->string('merek');
            $table->string('tahun_perolehan');
            $table->text('harga_perolehan');
            $table->string('masa_guna');
            $table->string('lama_pakai');
            $table->text('kondisi');
            $table->string('lokasi');
            $table->text('pengguna');
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
        Schema::dropIfExists('elektroniks');
    }
}