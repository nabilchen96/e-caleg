<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suaras', function (Blueprint $table) {
            $table->id();
            $table->string('id_calon');
            $table->string('id_tps');
            $table->integer('total_suara_sah')->nullable();
            $table->integer('total_suara_tidak_sah')->nullable();
            $table->string('id_user');
            $table->string('file_c1')->nullable();
            $table->string('id_jadwal');
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
        Schema::dropIfExists('suaras');
    }
}
