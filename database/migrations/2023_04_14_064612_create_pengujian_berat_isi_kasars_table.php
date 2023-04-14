<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengujianBeratIsiKasarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengujian_berat_isi_kasars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_uji')->nullable();
            $table->string('kerikil_asal')->nullable();
            $table->double('diameter_maksimum')->nullable();
            $table->enum('keadaan_kerikil',['Kering Tungku','Agak Basah','Jenuh Kering Muka']);
            $table->double('b1')->nullable();
            $table->double('b2')->nullable();
            $table->double('diameter_dalam')->nullable();
            $table->double('tinggi_bejana_dalam')->nullable();
            $table->double('berat_kerikil_tumbuk')->nullable();
            $table->double('berat_satuan_kerikil_tumbuk')->nullable();
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
        Schema::dropIfExists('pengujian_berat_isi_kasars');
    }
}
