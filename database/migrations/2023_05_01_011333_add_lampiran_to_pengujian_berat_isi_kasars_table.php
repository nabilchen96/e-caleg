<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLampiranToPengujianBeratIsiKasarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengujian_berat_isi_kasars', function (Blueprint $table) {
            $table->string('lampiran_bahan_uji')->after('berat_satuan_kerikil_tumbuk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengujian_berat_isi_kasars', function (Blueprint $table) {
            //
        });
    }
}
