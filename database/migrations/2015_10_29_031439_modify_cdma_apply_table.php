<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCdmaApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cdma_applies', function (Blueprint $table) {
            //
            $table->foreign('cdma_status_id')->references('id')->on('cdma_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cdma_applies', function (Blueprint $table) {
            //
            $table->dropForeign('cdma_applies_cdma_status_id_foreign');
        });
    }
}
