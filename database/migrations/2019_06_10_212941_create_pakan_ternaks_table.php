<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePakanTernaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pakan_ternaks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('luas_tanaman_pakan_ternak_rumput_gajah_dll')->nullable();
            $table->string('produksi_hijauan_makanan_ternak')->nullable();
            $table->string('dipasok_dari_luar_kelurahan')->nullable();
            $table->integer('disubsidi_dinas')->nullable();
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
        Schema::dropIfExists('pakan_ternaks');
    }
}
