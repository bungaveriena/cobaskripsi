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
        Schema::create('data_pengajuan_ceks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengaju');
            $table->string('alamat');
            $table->string('no_tlp');
            $table->string('email_pengaju');
            $table->string('asal_instansi');
            $table->string('nama_diajukan');
            $table->string('relasi');
            $table->string('keperluan');
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
        Schema::dropIfExists('data_pengajuan_ceks');
    }
};
