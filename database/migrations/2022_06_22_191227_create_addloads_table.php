<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addloads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pickup')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('weight')->nullable();
            $table->string('truck_type')->nullable();

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
        Schema::dropIfExists('addloads');
    }
}
