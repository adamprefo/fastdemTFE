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
        Schema::table('devis', function (Blueprint $table) {

            $table->dropForeign('devis_reservations_id_foreign');
                  
        $table->foreign('user_id')
        ->references('id')->on('users')
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
        Schema::table('devis', function (Blueprint $table) {

            $table->dropForeign('devis_reservations_id_foreign');
                  
        $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade')->onUpdate('cascade');
     
    });
    }
}
