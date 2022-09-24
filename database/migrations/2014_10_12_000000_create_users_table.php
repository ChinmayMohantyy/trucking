<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('survey')->nullable();
            $table->string('user_type')->nullable();
            $table->string('organisation_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('business_types')->nullable();
            $table->string('mc_ff_mx')->nullable();
            $table->string('dot')->nullable();
            $table->string('post_load')->nullable();
            $table->string('tms_use')->nullable();
            $table->string('tc_agreed')->nullable();
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
