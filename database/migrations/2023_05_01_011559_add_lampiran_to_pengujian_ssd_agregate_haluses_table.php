<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLampiranToPengujianSsdAgregateHalusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengujian_ssd_agregate_haluses', function (Blueprint $table) {
            $table->string('lampiran_bahan_uji')->after('kesimpulan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengujian_ssd_agregate_haluses', function (Blueprint $table) {
            //
        });
    }
}
