<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAturanNilaiSamaptasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aturan_nilai_samaptas', function (Blueprint $table) {
            $table->id('');
            $table->string('untuk');
            $table->string('jenis_samapta');
            $table->integer('ukuran_menit');
            $table->double('jumlah', 8, 2);
            $table->float('nilai');
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
        Schema::dropIfExists('aturan_nilai_samaptas');
    }
}
