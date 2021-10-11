<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKeysToDeleteUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {

                $table->dropForeign('devis_user_id_foreign');
    
                $table->foreign('announcement_id')
                        ->references('id')->on('announcements')
                        ->onDelete('cascade')->onUpdate('cascade');
            }); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delete_user', function (Blueprint $table) {
            //
        });
    }
}
