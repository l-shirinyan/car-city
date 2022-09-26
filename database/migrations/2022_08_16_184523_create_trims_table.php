<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trims', function (Blueprint $table) {
            $table->id();
            // $table->float('price')->nullable();
            $table->json('highlights')->nullable();
            $table->float('engine')->nullable();
            $table->string('transmission')->nullable();
            $table->float('carbon_emission')->nullable();
            $table->json('specs')->nullable();
            $table->foreignId('vehicle_model_id')->unsigned()->nullable();
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
        Schema::dropIfExists('trims');
    }
}
