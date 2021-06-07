<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('current_company_id')->nullable();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('managing_company_id')->nullable();
            $table->unsignedBigInteger('industry_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table ->date('birth_date')->nullable();
            $table ->string('phone_number')->nullable();
            $table ->string('city')->nullable();
            $table ->string('country')->nullable();
            $table ->text('about')->nullable();
            $table ->boolean('looking_for_job')->nullable();
            $table ->boolean('admin')->default(false);
            $table ->integer('years_of_experience')->nullable();
            $table ->string('role')->nullable();
            $table ->string('current_job_title')->nullable();
            $table ->string('current_company_name')->nullable();
            $table->boolean('logged_as_company')->default(false);
            $table ->string('profile_thumbnail')->nullable();
            $table->timestamps();

            //forgein keys
            $table->foreign('current_company_id')->references('id')->on('companies');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('managing_company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('users');
    }
}
