<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();
			$table->foreign('group_id')->references('id')->on('groups');
        });

        
        DB::table('users')->insert(
            [
                array(
                    'email' => 'admin@admin.com',
                    'password' => Hash::make(12345),
                    'group_id' => 1
                )
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		$table->dropForeign('users_group_id_foreign');
        $table->dropColumn('group_id');
    }
}
