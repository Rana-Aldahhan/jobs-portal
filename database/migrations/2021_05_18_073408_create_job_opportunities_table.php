<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_opportunities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('industry_id')->nullable();
            $table->unsignedBigInteger('publishable_id')->nullable();
            $table->string('publishable_type')->nullable();
            $table->boolean('expired')->default(false);
            $table->unsignedBigInteger('positionType_id')->nullable();
            $table->string('title');
            $table->longText('description');
            $table->boolean('remote');
            $table->boolean('transportation')->nullable();
            $table->integer('salary');
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('role');
            $table->integer('required_experience');
            $table->timestamps();
            //foreign key

            //$table->foreign('positionType_id')->references('id')->on('position_types');
            //$table->foreign('industry_id')->references('id')->on('industries');

            //TODO on delete publishable
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_opportunities');
    }
}
