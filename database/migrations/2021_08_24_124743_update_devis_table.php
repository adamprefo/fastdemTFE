<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
   Schema::table('devis', function (Blueprint $table) {
      $table->unsignedBigInteger('packs_id')->index()->nullable();;
      $table->foreign('packs_id')
             ->references('id')->on('packs')
             ->onDelete('restrict')->onUpdate('cascade');


});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
