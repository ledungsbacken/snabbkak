<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description')->nullable();
        });

        DB::table('permissions')->insert([
            [
                'name' => 'access',
                'description' => 'Can login',
            ],
            [
                'name' => 'my_content',
                'description' => 'Can fully administer own recepies',
            ],
            [
                'name' => 'edit_recepies',
                'description' => 'Can edit all recepies',
            ],
            [
                'name' => 'delete_recepies',
                'description' => 'Can soft delete recepies',
            ],
            [
                'name' => 'hard_delete_recepies',
                'description' => 'Can hard delete recepies',
            ],
            [
                'name' => 'quarantine_users',
                'description' => 'Can quarantine users',
            ],
            [
                'name' => 'admin_users',
                'description' => 'Can admin all users',
            ],
            [
                'name' => 'full',
                'description' => 'Can do everything',
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
        Schema::dropIfExists('permissions');
    }
}
