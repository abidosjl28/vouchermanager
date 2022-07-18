<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city');
            $table->string('phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('country');
            $table->string('passport')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
