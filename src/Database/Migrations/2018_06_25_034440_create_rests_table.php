<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rests', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('uid')->unsigned();

            $table->text('table')->nullable();
            $table->text('url')->nullable();
            $table->text('company')->nullable();
            $table->text('body')->nullable();
            $table->text('tags')->nullable();
            $table->integer('dashboard')->nullable();
            $table->timestamps();

            $table->foreign('uid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rests');
    }
}
