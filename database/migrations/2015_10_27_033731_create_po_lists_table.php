<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("task_id")->unsigned();
            $table->integer('purchaselist_id')->unsigned();
            $table->decimal("qty",8,2);

            $table->timestamps();
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('purchaselist_id')->references('id')->on('purchase_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('po_lists');
    }
}
