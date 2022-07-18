<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('create_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('is_adult')->nullable();
            $table->date('arrivaldate');
            $table->date('departuredate');
            $table->string('have_children')->nullable();
            $table->string('room_type');
            $table->string('number_of_room');
            $table->string('night');
            $table->string('room_price');
            $table->decimal('total_amount', 15, 2)->nullable();
            $table->string('payment_mode');
            $table->string('observation')->nullable();
            $table->string('service')->nullable();
            $table->string('internal_note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
