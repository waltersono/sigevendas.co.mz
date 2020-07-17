<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->enum('gender',['m','f','o']);
            $table->date('dob');
            $table->string('id_number')->unique()->nullable();
            $table->bigInteger('nuit')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('contact_1')->unique()->nullable();
            $table->string('contact_2')->unique()->nullable();
            $table->unsignedMediumInteger('career_id');
            $table->unsignedTinyInteger('academicLevel_id');
            $table->boolean('central');
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('repartition_id')->nullable();
            $table->string('photo_path')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
