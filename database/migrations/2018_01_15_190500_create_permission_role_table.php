<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->foreign('role_id')->references('id')->on('roles');
        });

        DB::table('permission_role')->insert([
            // user
            // access my_content
            [
                'permission_id' => '1',
                'role_id' => '1',
            ],
            [
                'permission_id' => '2',
                'role_id' => '1',
            ],
            // moderator
            // access my_content delete_recepies quarantine_users
            [
                'permission_id' => '1',
                'role_id' => '2',
            ],
            [
                'permission_id' => '2',
                'role_id' => '2',
            ],
            [
                'permission_id' => '4',
                'role_id' => '2',
            ],
            [
                'permission_id' => '6',
                'role_id' => '2',
            ],
            // admin
            // access my_content edit_recepies delete_recepies hard_delete_recepies quarantine_users admin_users
            [
                'permission_id' => '1',
                'role_id' => '3',
            ],
            [
                'permission_id' => '2',
                'role_id' => '3',
            ],
            [
                'permission_id' => '3',
                'role_id' => '3',
            ],
            [
                'permission_id' => '4',
                'role_id' => '3',
            ],
            [
                'permission_id' => '5',
                'role_id' => '3',
            ],
            [
                'permission_id' => '6',
                'role_id' => '3',
            ],
            [
                'permission_id' => '7',
                'role_id' => '3',
            ],
            // super_admin
            // full
            [
                'permission_id' => '8',
                'role_id' => '4',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
