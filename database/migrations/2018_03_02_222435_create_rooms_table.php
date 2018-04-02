<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('roomNumber');
            $table->string('roomType');
            $table->enum('roomBuilding',['Harvard','Princeton', 'Wharton']);
            $table->string('roomStatus');
            $table->integer('roomPrice')->unsigned()->index();
            $table->timestamps();
        }); 
        Schema::table('rooms', function (Blueprint $table) {
//            $table->foreign('roomInventoryId')->references('id')->on('roomInventories')->onDelete('cascade')->onUpdate('cascade');
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
