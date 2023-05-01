<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLampiranToAnalisaSaringanHalusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('analisa_saringan_haluses', function (Blueprint $table) {
            $table->string('lampiran_bahan_uji')->after('daerah_gradasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('analisa_saringan_haluses', function (Blueprint $table) {
            //
        });
    }
}
