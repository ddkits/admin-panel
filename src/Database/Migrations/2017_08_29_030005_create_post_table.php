<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (!Schema::hasTable('post')) {
            Schema::create('post', function (Blueprint $table) {
                $table->increments('id');
                $table->bigInteger('uid')->unsigned();
                $table->longText('title');
                $table->longText('body');
                $table->string('path');
                $table->string('tags')->default('N/A');
                $table->timestamps();

                $table->foreign('uid')->references('id')->on('users');
            });
            
        }else{
            if (Schema::hasColumn('post', 'uid')){
            return;
            }else{
                Schema::table('post', function (Blueprint $table)
                {
                    $table->bigInteger('uid')->unsigned();
                    $table->foreign('uid')->references('id')->on('users');
                });
            }
            if (Schema::hasColumn('post', 'title')){
            return;
            }else{
                Schema::table('post', function (Blueprint $table)
                {
                    $table->longText('title')->nullable();
                });
            }
            if (Schema::hasColumn('post', 'body')){
            return;
            }else{
                Schema::table('post', function (Blueprint $table)
                {
                    $table->longText('body')->nullable();
                });
            }
            if (Schema::hasColumn('post', 'tags')){
            return;
            }else{
                Schema::table('post', function (Blueprint $table)
                {
                    $table->string('tags')->default('N/A');
                });
            }
            
            if (Schema::hasColumn('post', 'path')){
            return;
            }else{
                Schema::table('post', function (Blueprint $table)
                {
                    $table->string('path')->nullable();
                });
            }
             
            if (Schema::hasColumn('post', 'created_at')){
            return;
            }else{
                Schema::table('post', function (Blueprint $table)
                {
                     $table->timestamps();
                });
            }
            
            
            
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
