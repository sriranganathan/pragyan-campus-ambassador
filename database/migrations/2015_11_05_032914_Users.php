<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id',100);
            $table->string('facebook_user_id',30);
            $table->string('full_name',150);
            $table->string('image_url', 200);
            $table->string('college', 200);
            $table->string('city', 100);
            $table->string('dept', 150);
            $table->string('year', 6);
            $table->string('mobile', 15);
            $table->string('email', 300);
            $table->string('por', 500);
            $table->string('question', 1200);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('users');
    }
}
