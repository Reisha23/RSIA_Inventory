<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukTable extends Migration
{
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id('id_incoming'); // Primary key
            $table->string('item_name'); // Nama barang
            $table->integer('total_incoming'); // Jumlah barang
            $table->string('username'); // Nama user
            $table->dateTime('incoming_date'); // Tanggal masuk
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang_masuk');
    }
}

