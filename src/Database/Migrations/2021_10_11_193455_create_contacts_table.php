<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 75)->nullable();
            $table->string('email', 75)->nullable();
            $table->string('phone', 75)->nullable();
            $table->string('address')->nullable();
            $table->text('subject')->nullable();
            $table->text('message')->nullable();
            $table->text('deleted_at')->nullable();
            $table->string('howdidyoufindus',255)->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
