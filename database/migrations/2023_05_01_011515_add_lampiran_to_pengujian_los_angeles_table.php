<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLampiranToPengujianLosAngelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengujian_los_angeles', function (Blueprint $table) {
            $table->string('lampiran_bahan_uji')->after('total_keausan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengujian_los_angeles', function (Blueprint $table) {
            //
        });
    }
}
