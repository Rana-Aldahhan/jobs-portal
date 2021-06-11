<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('industry_id');
            $table ->string('name');
            $table ->string('email')->unique();
            $table ->string ('website_url')->nullable();
            $table ->string('phone_number');
            $table ->integer('employees_count');
            $table ->string('city');
            $table ->string('country');
            $table ->string('slogan')->nullable();
            $table->longText('about')->nullable();
            $table ->string('profile_thumbnail')->nullable();
            $table->timestamps();
            //foreign keys
            $table->foreign('industry_id')->references('id')->on('industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
