<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganicUnitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organic_unities', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->unique();
            $table->unsignedInteger('general_manager_id')->nullable();
            $table->unsignedInteger('deputy_director_id')->nullable();
            //$table->foreign('general_manager_id')->references('id')->on('users');
            //$table->foreign('deputy_director_id')->references('id')->on('users');
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
        Schema::dropIfExists('organic_unities');
    }
}
