<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdmaApplyLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdma_apply_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cdma_apply_id')->unsigned();
            $table->integer('cdma_status_id')->unsigned();
            $table->string('attachment')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('cdma_apply_id')
                ->references('id')
                ->on('cdma_applies')
                ->onDelete('cascade');
            $table->foreign('cdma_status_id')
                ->references('id')
                ->on('cdma_statuses')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cdma_apply_logs');
    }
}
