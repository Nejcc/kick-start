<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForenKeysForRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            // if you delete user the roles will delete on that user and will not be stored inside role_user

//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table){
//            $table->dropForeign('role_user_user_id_foreign');
//            $table->dropForeign('role_user_role_id_foreign');
        });
    }
}
