<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdmaStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdma_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('icon_url')->nullable();
            $table->integer('code');
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
        Schema::drop('cdma_statuses');
    }
}
