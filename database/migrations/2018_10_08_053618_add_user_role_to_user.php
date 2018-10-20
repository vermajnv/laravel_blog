<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserRoleToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *  here user_role = 1 (For admin)
     *  user_role = 2 (For users)
     */
    public function up()
    {
        Schema::table('users', function($table) 
        {
            $table->integer('user_role')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) 
        {
            $table->dropColumn('user_role');
        });
    }
}
