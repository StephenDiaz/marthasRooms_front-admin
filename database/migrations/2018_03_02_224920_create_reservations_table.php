<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('noOfAdults');
            $table->integer('noOfChildren')->default(0);
            $table->date('checkIn');
            $table->date('checkOut');
            $table->longText('additionalInfo')->nullable();
            $table->string('status')->default('pending');
            $table->integer('billingId')->unsigned()->nullable();
            $table->foreign('billingId')->references('id')->on('billings')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('roomTypeId')->unsigned(); 
            $table->foreign('roomTypeId')->references('id')->on('room_types')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('guestId')->unsigned();
            $table->foreign('guestId')->references('id')->on('guests')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
