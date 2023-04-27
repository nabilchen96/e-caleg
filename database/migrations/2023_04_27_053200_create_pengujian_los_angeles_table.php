<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengujianLosAngelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengujian_los_angeles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_uji')->nullable();
            $table->string('kerikil_asal')->nullable();
            $table->enum('gradasi',['A','B','C']);
            $table->double('berat_benda_uji')->nullable();
            $table->double('berat_benda_uji_sesudah_pertama')->nullable();
            $table->double('berat_benda_uji_sesudah_kedua')->nullable();
            $table->double('keausan_1')->nullable();
            $table->double('keausan_2')->nullable();
            $table->double('total_keausan')->nullable();
            $table->double('kelas_pubi')->nullable();
            $table->unsignedBigInteger('user_verifikator_id')->nullable();
            $table->foreign('user_verifikator_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status_verifikasi',['0','1','2']);
            $table->text('alasan')->nullable();
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
        Schema::dropIfExists('pengujian_los_angeles');
    }
}
