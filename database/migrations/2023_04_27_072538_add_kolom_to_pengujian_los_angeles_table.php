<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKolomToPengujianLosAngelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengujian_los_angeles', function (Blueprint $table) {
            $table->string('kelas_pubi_desk')->after('kelas_pubi')->nullable();
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
