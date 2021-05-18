<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('email_address');
            $table->integer('phone_number');
            $table->string('location');
            $table->string('event_description');
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
