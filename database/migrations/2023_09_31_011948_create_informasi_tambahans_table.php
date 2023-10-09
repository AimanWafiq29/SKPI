<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiTambahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_tambahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id');
            $table->string('pelatihan')->nullable();
            $table->string('penhargaan')->nullable();
            $table->string('organisasi')->nullable();
            $table->string('skripsi')->nullable();
            $table->string('magang')->nullable();
            $table->string('seminar')->nullable();
            $table->timestamps();

            // Definisikan foreign key ke kolom 'id' pada tabel 'biodata'
            $table->foreign('biodata_id')->references('id')->on('biodatas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_tambahans');
    }
}
