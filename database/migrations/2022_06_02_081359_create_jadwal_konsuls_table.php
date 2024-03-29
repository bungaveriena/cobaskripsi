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
        Schema::create('jadwal_konsuls', function (Blueprint $table) {
            $table->id();
            //$table->string('nama_korban');
            //$table->string('email_korban');
            $table->foreignId('pengaduan_id');
            $table->foreignId('pendamping_id');
            //$table->string('hari');
            $table->date('tanggal');
            $table->time('pukul');
            //$table->string('pendamping');
            
            $table->string('keterangan');
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
        Schema::dropIfExists('jadwal_konsuls');
    }
};
