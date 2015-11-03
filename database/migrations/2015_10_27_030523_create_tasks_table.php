<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('category_id')->unsigned();
            $table->integer('step_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('applicant')->index();
            $table->string('phonenumber')->index();
            $table->string('costcent')->index();
            $table->string('task_no');
            $table->string('subject');
            $table->string('reason');
            $table->text('remark')->nullable();
            $table->string('attachment');

            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('task_categories')->onDelete('cascade');
            $table->foreign('step_id')->references('id')->on('task_steps')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('task_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
