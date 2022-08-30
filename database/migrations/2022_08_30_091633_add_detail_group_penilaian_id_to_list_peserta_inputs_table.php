<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailGroupPenilaianIdToListPesertaInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_peserta_inputs', function (Blueprint $table) {
            $table->integer('detail_group_penilaian_id')->after('nomor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_peserta_inputs', function (Blueprint $table) {
            //
        });
    }
}
