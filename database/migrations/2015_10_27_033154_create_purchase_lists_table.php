<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('brand');
            $table->string('c_model');
            $table->string('e_model');
            $table->string('description')->nullable();
            $table->string('spec')->nullable();
            $table->string('unit');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchase_lists');
    }
}
