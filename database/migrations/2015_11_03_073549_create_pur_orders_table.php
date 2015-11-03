<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pur_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('qty');
            $table->string('remark')->nullable();
            $table->timestamps();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pur_orders');
    }
}
