<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_2s', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->unsignedInteger('cicle_id');
            $table->foreign('cicle_id')->references('id')->on('cicles');
            $table->boolean('activate')->default(false);
            $table->string('email');
            $table->string('email_verified_at');
            $table->string('password');
            $table->string('type')->default('client');
            $table->integer('num_offer_applied');
            $table->string('remember_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_2s');
    }
}
