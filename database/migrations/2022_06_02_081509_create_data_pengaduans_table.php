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
        Schema::create('data_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_korban');
            $table->string('alamat_korban');
            $table->string('email_korban');
            $table->string('notlp_korban');
            $table->string('pembuat_pengaduan');
            $table->string('relasi_korban');
            $table->string('nama_pelaku');
            $table->string('alamat_pelaku');
            $table->string('email_pelaku');
            $table->string('notlp_pelaku');
            $table->string('kronologi');
            $table->string('bukti'); //file upload
            $table->string('bantuan');
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
        Schema::dropIfExists('data_pengaduans');
    }
};
