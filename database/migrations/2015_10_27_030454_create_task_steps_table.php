<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',40)->unique();
            $table->string('description')->nullable();
            $table->string('icon_url')->nullable();
            $table->integer('order')->unique();

            $table->softDeletes();
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
        Schema::drop('task_steps');
    }
}
