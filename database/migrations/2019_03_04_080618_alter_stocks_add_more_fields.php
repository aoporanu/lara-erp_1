<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStocksAddMoreFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stocks', function(Blueprint $table) {
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->integer('qty');
            $table->integer('id_products')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function(Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('price');
            $table->dropColumn('qty');
            $table->dropColumn('product_id');
        });
    }
}
