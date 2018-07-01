<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();        
            $table->integer('group_id')->unsigned();            
            $table->string('reason');        
            $table->binary('pathBefore')->nullable();        
            $table->binary('pathAfter')->nullable();
            $table->timestamps();            
            $table->foreign('group_id')->references('id')->on('groups');
        });

        DB::statement("alter table applications CHANGE pathAfter pathAfter LONGBLOB NULL DEFAULT NULL");
        DB::statement("alter table applications CHANGE pathBefore pathBefore LONGBLOB NULL DEFAULT NULL");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
