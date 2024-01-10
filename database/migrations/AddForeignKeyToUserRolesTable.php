<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUserRolesTable extends Migration
{
    public function up()
    {
        Schema::table('user_roles', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('user_roles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            
        });
    }
}