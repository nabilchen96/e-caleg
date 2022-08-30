<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListPesertaInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_peserta_inputs', function (Blueprint $table) {
            $table->id();
            $table->integer('peserta_id')->nullable();
            $table->integer('grup_penilaian_id')->nullable();
            $table->enum('status',['0','1']);
            $table->integer('panitia_id')->nullable();
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
        Schema::dropIfExists('list_peserta_inputs');
    }
}
