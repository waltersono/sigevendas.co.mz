<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntranceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrance_logs', function (Blueprint $table) {
            $table->id();
            $table->string('product_category'); 
            $table->string('product_name');
            $table->unsignedBigInteger('old_quantity');
            $table->integer('add_quantity');
            $table->unsignedBigInteger('new_quantity');
            $table->unsignedBigInteger('store_id');
            $table->string('day');
            $table->string('month');
            $table->string('year');
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
        Schema::dropIfExists('entrance_logs');
    }
}
