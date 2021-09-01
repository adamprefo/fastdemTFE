<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devis_id');
            $table->foreignId('truck_id');

            $table->time('start_time');
            $table->time('finish_time');



             
            $table->foreign('devis_id')
                    ->references('id')->on('devis')
                    ->onDelete('restrict')->onUpdate('cascade');
             
            $table->foreign('truck_id')
                    ->references('id')->on('trucks')
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
        Schema::dropIfExists('reservations');
    }
}
