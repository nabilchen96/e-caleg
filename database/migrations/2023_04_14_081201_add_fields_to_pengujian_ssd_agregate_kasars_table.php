<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPengujianSsdAgregateKasarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengujian_ssd_agregate_kasars', function (Blueprint $table) {
            $table->double('berat_jenis_mutlak')->after('berat_kerikil_kering_tungku')->nullable();
            $table->double('berat_jenis_kering_tungku')->after('berat_jenis_mutlak')->nullable();
            $table->double('berat_jenis_ssd')->after('berat_jenis_kering_tungku')->nullable();
            $table->double('presentase_penyerapan')->after('berat_jenis_ssd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengujian_ssd_agregate_kasars', function (Blueprint $table) {
            //
        });
    }
}
