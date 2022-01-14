<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newids', function (Blueprint $table) {
            $table->id();
            $table->string('documento')->unique();
            $table->longText('nombre');
            $table->string('cola');
            $table->string('ticket');
            $table->string('atendido')->length(1)->default('N');
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
        Schema::dropIfExists('newids');
    }
}
