<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('id_out'); // Primary key
            $table->string('item_name'); // Nama barang
            $table->integer('total_out'); // Jumlah barang
            $table->string('username'); // Nama user
            $table->dateTime('out_date'); // Tanggal masuk
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluar');
    }
};