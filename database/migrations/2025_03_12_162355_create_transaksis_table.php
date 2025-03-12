<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_transaksi', ['pembelian', 'penjualan']);
            $table->unsignedBigInteger('obat_id');
            $table->integer('jumlah');
            $table->decimal('total_harga', 10, 2);
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->timestamps();

            $table->foreign('obat_id')->references('id')->on('obats')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
};
