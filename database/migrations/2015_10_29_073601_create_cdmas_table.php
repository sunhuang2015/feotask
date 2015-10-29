<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phonenumber')->unique();
            $table->integer('company_id')->unsigned();
            $table->string('department_name')->nullable();
            $table->string('employee_number')->nullable();
            $table->string('employee_name')->nullable();
            $table->integer('status_id')->unsigned();
            $table->integer('package_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cdmas');
    }
}
