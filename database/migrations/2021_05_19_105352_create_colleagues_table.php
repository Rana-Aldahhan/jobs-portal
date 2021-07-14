<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColleaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleagues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user1_id')->nullable();
            $table->unsignedBigInteger('user2_id')->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();
            //foreign keys
            //$table->foreign('user1_id')->references('id')->on('users');
            //$table->foreign('user2_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleagues');
    }
}
