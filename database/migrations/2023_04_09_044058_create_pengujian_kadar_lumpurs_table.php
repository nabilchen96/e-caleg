<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengujianKadarLumpursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengujian_kadar_lumpurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_uji')->nullable();
            $table->string('pasir_asal')->nullable();
            $table->double('berat_pasir_1')->nullable();
            $table->double('berat_pasir_2')->nullable();
            $table->double('hasil_kadar_lumpur')->nullable();
            $table->enum('kesimpulan',['Sesuai','Tidak Sesuai']);
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
        Schema::dropIfExists('pengujian_kadar_lumpurs');
    }
}
