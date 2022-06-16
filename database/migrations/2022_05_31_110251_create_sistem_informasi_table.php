<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistemInformasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistem_informasi', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_buka')->nullable();
            $table->date('tgl_tutup')->nullable();
            $table->string('sesi');
            $table->boolean('rilis')->default(0);
            $table->text('persyaratan');
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
        Schema::dropIfExists('sistem_informasi');
    }
}
