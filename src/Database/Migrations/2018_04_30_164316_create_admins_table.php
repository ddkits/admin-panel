<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('admins')) {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('uid')->unsigned();
            $table->integer('level');
            $table->timestamps();

            $table->foreign('uid')->references('id')->on('users');

        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
