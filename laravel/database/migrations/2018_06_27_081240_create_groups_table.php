<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');			
			$table->string('name');
			$table->string('imagePath');
            $table->timestamps();
        });

        DB::table('groups')->insert(
            [
                array(
                    'name' => 'XMEN',
                    'imagePath' => 'Groups/xmen.jpg'
                ),
                array(
                    'name' => 'Mutant',
                    'imagePath' => 'Groups/mutante.jpg'
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
		Schema::disableForeignKeyConstraints(); 
		Schema::dropIfExists('groups');
		Schema::enableForeignKeyConstraints();
    }
}
