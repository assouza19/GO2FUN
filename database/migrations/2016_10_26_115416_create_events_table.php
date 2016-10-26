<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('categories');
            $table->string('name');
            $table->string('status');
            $table->string('value');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('cep');
            $table->string('bairro')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->dateTime('init_at');
            $table->dateTime('end_at');
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
        Schema::dropIfExists('events');
    }
}
