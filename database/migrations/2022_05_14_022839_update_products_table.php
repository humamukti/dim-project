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
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('name', 'nama_barang');
            $table->dropColumn('detail');
            $table->integer('harga_barang');
            $table->integer('biaya_penyimpanan');
            $table->integer('periode_permintaan');
            $table->string('satuan');
            $table->integer('konversi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('nama_barang', 'name');
            $table->text('detail');
            $table->dropColumn('harga_barang');
            $table->dropColumn('biaya_penyimpanan');
            $table->dropColumn('periode_permintaan');
            $table->dropColumn('satuan');
            $table->dropColumn('konversi');
        });
    }
};
