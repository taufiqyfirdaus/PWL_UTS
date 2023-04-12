<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id('id_keluarga');
            $table->string('nama', 50);
            $table->string('nama_ayah', 50);
            $table->string('telp_ayah', 12);
            $table->string('nama_ibu', 50);
            $table->string('telp_ibu', 12);
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
        Schema::dropIfExists('keluarga_models');
    }
};
