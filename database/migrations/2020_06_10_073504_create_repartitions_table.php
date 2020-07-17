<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepartitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repartitions', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->unsignedBigInteger('head_of_repartition_id')->nullable();
            $table->boolean('central');
            $table->unsignedBigInteger('division_id');
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
        Schema::dropIfExists('repartitions');
    }
}
