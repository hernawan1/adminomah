<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutomer', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('addres');
            $table->string('number');
            $table->string('email');
            $table->string('password');
            $table->string('uid');
            $table->string('pushtoken');
            $table->string('photo');
            $table->string('status');
            $table->string('jarak');
            $table->double('lat', 11, 8);
            $table->double('lng', 11, 8);
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
        Schema::dropIfExists('customer');
    }
}
