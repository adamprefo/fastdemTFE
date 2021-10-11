<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKeysToDeleteRes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {

            $table->dropForeign('devis_reservations_id_foreign');

            $table->foreign('devis_id')
            ->references('id')->on('devis')
            ->onDelete('cascade')->onUpdate('cascade');

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delete_res', function (Blueprint $table) {
            //
        });
    }
}
