<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableRiwayat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id('id');
            $table->string('idtukang');
            $table->integer('idcustomer');
            $table->string('idmodel');
            $table->string('totalharga');
            $table->date('tgltransaksi');
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
        //
    }
}
