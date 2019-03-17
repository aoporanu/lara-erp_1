<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('agent_id')->unsigned();
            $table->integer('shop_id')->unsigned()->nullable();
            $table->integer('day1')->default(0);
            $table->integer('day2')->default(0);
            $table->integer('day3')->default(0);
            $table->integer('day4')->default(0);
            $table->integer('day5')->default(0);
            $table->integer('day6')->default(0);
            $table->integer('day7')->default(0);
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
        Schema::dropIfExists('routes');
    }
}
