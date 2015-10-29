<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdmaAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdma_applies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('employee_number')->unique();
            $table->string('employee_name');
            $table->string('employee_email')->nullable();
            $table->string('department_name');
            $table->string('attachment')->nullable();
            $table->string('snc')->nullable();
            $table->string('cid')->nullable();
            $table->integer('cdma_status_id')->unsigned();
            $table->string('phonenumber')->nullable();
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
        Schema::drop('cdma_applies');
    }
}
