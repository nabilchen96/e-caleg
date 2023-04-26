<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengujianSsdAgregateHalusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengujian_ssd_agregate_haluses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_uji')->nullable();
            $table->string('pasir_asal')->nullable();
            $table->double('berat_pasir_tabung_air')->nullable(); //inputan a
            $table->double('berat_pasir_ssd')->nullable(); //inputan b
            $table->double('berat_tabung_air')->nullable(); //inputan c
            $table->double('berat_pasir_kering_tungku')->nullable(); //inputan d
            $table->double('berat_jenis_tungku')->nullable(); //diproses
            $table->double('ssd_pasir_kering_tungku')->nullable(); //diproses
            $table->enum('kesimpulan',['Memenuhi','Tidak Memenuhi']);
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
        Schema::dropIfExists('pengujian_ssd_agregate_haluses');
    }
}
