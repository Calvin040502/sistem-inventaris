<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeterangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('keterangan');
            $table->text('kilometer')->nullable();
            $table->text('total_harga');
            $table->unsignedBigInteger('kendaraan_id');
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
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
        Schema::dropIfExists('keterangans');
    }
}
