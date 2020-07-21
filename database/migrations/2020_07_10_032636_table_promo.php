<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePromo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama');
            $table->integer('potongan');
            $table->string('photo');
            $table->string('detail');
            $table->date('tglawal');
            $table->date('tglakhir');
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
        Schema::dropIfExists('promo');
    }
}
