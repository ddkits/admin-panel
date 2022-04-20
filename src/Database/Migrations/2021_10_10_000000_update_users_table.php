<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('api_id', 128)->unique()->nullable();
            $table->integer('blocked')->default(0);
            $table->text('firstname')->nullable();
            $table->text('lastname')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('howdidyoufindus')->nullable();
            $table->string('industry')->nullable();
            $table->text('ip')->nullable();
            $table->text('job_title')->nullable();
            $table->integer('api_only')->default(0);
            $table->integer('role')->default(1);
            $table->integer('level')->default(1);
            $table->integer('profile')->nullable()->unique();
            $table->string('api_token', 128)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile');
            $table->dropColumn('level');
            $table->dropColumn('api_token');
            $table->dropColumn('role');
            $table->dropColumn('api_only');
            $table->dropColumn('job_title');
            $table->dropColumn('ip');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('blocked');
            $table->dropColumn('api_id');
            $table->dropColumn('industry');
        });
    }
}
