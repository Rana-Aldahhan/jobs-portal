<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->text('information');
            $table->unsignedBigInteger('sendable_id')->nullable();
            $table->string('sendable_type')->nullable();
            $table->unsignedBigInteger('recievable_id')->nullable();
            $table->string('recievable_type')->nullable();
            $table->timestamps();
              //forgein keys
              //$table->foreign('current_company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
