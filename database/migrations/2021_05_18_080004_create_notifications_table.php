<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            $table->unsignedBigInteger('notifable_id')->nullable();
            $table->string('notifable_type')->nullable();
            $table->unsignedBigInteger('causable_id')->nullable();
            $table->string('causable_type')->nullable();
            $table->string('notification_url');
           // TODO //new colunms
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
        Schema::dropIfExists('notifications');
    }
}
