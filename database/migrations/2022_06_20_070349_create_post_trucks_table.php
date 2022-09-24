<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_trucks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference')->nullable();
            $table->string('truck_type')->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('min_hauling_distance')->nullable();
            $table->string('max_hauling_distance')->nullable();
            $table->string('desired_rate_per_mile')->nullable();
            $table->date('avilibility_date')->nullable();
            $table->string('description')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('post_trucks');
    }
}
