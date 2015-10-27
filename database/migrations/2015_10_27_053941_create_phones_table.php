<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->unique();
            $table->integer('category_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('department_name')->nullable();
            $table->string('costcent')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('employee_number')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('phone_categories')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('phone_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phones');
    }
}
