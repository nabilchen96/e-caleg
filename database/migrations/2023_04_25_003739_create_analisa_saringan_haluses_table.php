<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaSaringanHalusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_saringan_haluses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_uji')->nullable();
            $table->string('pasir_asal')->nullable();
            $table->double('berat_pasir')->nullable();
            $table->double('inputa_1')->nullable();
            $table->double('inputa_2')->nullable();
            $table->double('inputa_3')->nullable();
            $table->double('inputa_4')->nullable();
            $table->double('inputa_5')->nullable();
            $table->double('inputa_6')->nullable();
            $table->double('sisa_inputa')->nullable();
            $table->double('jumlah_inputa')->nullable();
            $table->double('berat_tinggal_inputa_1')->nullable();
            $table->double('berat_tinggal_inputa_2')->nullable();
            $table->double('berat_tinggal_inputa_3')->nullable();
            $table->double('berat_tinggal_inputa_4')->nullable();
            $table->double('berat_tinggal_inputa_5')->nullable();
            $table->double('berat_tinggal_inputa_6')->nullable();
            $table->double('sisa_berat_tinggal_inputa')->nullable();
            $table->double('jumlah_berat_tinggal_inputa')->nullable();
            $table->double('berat_kumu_inputa_1')->nullable();
            $table->double('berat_kumu_inputa_2')->nullable();
            $table->double('berat_kumu_inputa_3')->nullable();
            $table->double('berat_kumu_inputa_4')->nullable();
            $table->double('berat_kumu_inputa_5')->nullable();
            $table->double('berat_kumu_inputa_6')->nullable();
            $table->double('sisa_berat_kumu_inputa')->nullable();
            $table->double('jumlah_berat_kumu_inputa')->nullable();
            $table->double('berat_kumu_la_1')->nullable();
            $table->double('berat_kumu_la_2')->nullable();
            $table->double('berat_kumu_la_3')->nullable();
            $table->double('berat_kumu_la_4')->nullable();
            $table->double('berat_kumu_la_5')->nullable();
            $table->double('berat_kumu_la_6')->nullable();
            $table->double('sisa_berat_kumu_la')->nullable();
            $table->double('jumlah_berat_kumu_la')->nullable();
            $table->double('modulus_halus')->nullable();
            $table->enum('daerah_gradasi',['Kasar','Agak Kasar','Agak Halus','Halus']);
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
        Schema::dropIfExists('analisa_saringan_haluses');
    }
}
