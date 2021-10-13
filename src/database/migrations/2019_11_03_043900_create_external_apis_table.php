<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExternalApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_apis', function (Blueprint $table) {
            $table->bigIncrements('id');
            // references signed id from user
            $table->bigInteger('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users');
            // references signed id from path
            $table->unsignedInteger('path_id');
            $table->foreign('path_id')->references('id')->on('tables_paths')->onDelete('cascade');
            $table->string('api_link')->unique()->nullable();
            $table->text('token')->nullable();
            $table->timestamps();
        });
        Schema::create('external_apis_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            // references signed id from external_apis
            $table->unsignedBigInteger('external_apis_id');
            $table->foreign('external_apis_id')->references('id')->on('external_apis')->onDelete('cascade');
            $table->text('header_title')->nullable();
            $table->text('header_value')->nullable();
            $table->timestamps();
        });
        Schema::create('external_apis_body', function (Blueprint $table) {
            $table->bigIncrements('id');
            // references signed id from external_apis
            $table->unsignedBigInteger('external_apis_id');
            $table->foreign('external_apis_id')->references('id')->on('external_apis')->onDelete('cascade');
            $table->text('body')->nullable();
            $table->timestamps();
        });
        Schema::create('external_apis_limit', function (Blueprint $table) {
            $table->bigIncrements('id');
            // references signed id from external_apis
            $table->unsignedBigInteger('external_apis_id');
            $table->foreign('external_apis_id')->references('id')->on('external_apis')->onDelete('cascade');
            $table->text('limit')->nullable();
            $table->BigInteger('uid')->nullable();
            $table->text('period')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('external_apis_limit');
        Schema::dropIfExists('external_apis_headers');
        Schema::dropIfExists('external_apis_body');
        Schema::dropIfExists('external_apis_id');
        Schema::dropIfExists('external_apis');
    }
}
