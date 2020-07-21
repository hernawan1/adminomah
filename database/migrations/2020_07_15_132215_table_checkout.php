<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCheckout extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->id('id');
            $table->string('idtukang');
            $table->integer('idcustomer');
            $table->string('idmodel');
            $table->string('totalharga');
            $table->date('tgltransaksi');
            $table->string('status');
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
        Schema::dropIfExists('checkout');
    }
}
