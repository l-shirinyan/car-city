<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->integer('previous_owners')->nullable();
            $table->float('price')->nullable();
            $table->float('price_per_month')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('stock_number')->nullable();
            $table->integer('nb_doors')->nullable();
            $table->float('miles')->nullable();
            $table->integer('year')->nullable();
            $table->string('color')->nullable();
            $table->string('additional_information')->nullable();
            $table->string('video_url')->nullable();
            $table->boolean('in_stock')->nullable();
            $table->foreignId('trim_id')->unsigned()->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
