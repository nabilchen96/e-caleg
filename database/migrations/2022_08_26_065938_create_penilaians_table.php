<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            
            $table->string('detail_grup_penilaian_id');
            
            $table->float('jarak_lari')->nullable();
            $table->float('nilai_lari')->nullable();

            $table->float('jumlah_push_up')->nullable();
            $table->float('nilai_push_up')->nullable();

            $table->float('jumlah_sit_up')->nullable();
            $table->float('nilai_sit_up')->nullable();

            $table->float('jumlah_shuttle_run')->nullable();
            $table->float('nilai_shuttle_run')->nullable();

            $table->string('panitia_id');

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
        Schema::dropIfExists('penilaians');
    }
}
