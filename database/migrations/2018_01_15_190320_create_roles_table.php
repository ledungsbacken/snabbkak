<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->string('description')->nullable();
        });

        DB::table('roles')->insert([
            [
                'name' => 'user',
                'label' => 'User',
            ],
            [
                'name' => 'moderator',
                'label' => 'Moderator',
            ],
            [
                'name' => 'admin',
                'label' => 'Admin',
            ],
            [
                'name' => 'super_admin',
                'label' => 'Super Admin',
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
        Schema::dropIfExists('roles');
    }
}
