<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestTablesContsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_tables_conts', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('uid')->unsigned();
            $table->text('api_id');
            $table->text('table');
            $table->text('body');
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
        Schema::dropIfExists('rest_tables_conts');
    }
}
