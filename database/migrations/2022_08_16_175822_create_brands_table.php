<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('color');
            $table->string('warranty')->nullable();

            $table->string('hero_title')->nullable();
            $table->string('hero_description')->nullable();

            $table->string('showroom_title')->nullable();
            $table->string('showroom_subtitle')->nullable();

            $table->string('promoted_title')->nullable();
            $table->mediumText('promoted_description')->nullable();
            $table->string('promoted_link')->nullable();

            $table->string('showroom_promoted_title')->nullable();
            $table->mediumText('showroom_promoted_description')->nullable();
            $table->string('showroom_promoted_link')->nullable();

            $table->string('marketing_title')->nullable();
            $table->mediumText('marketing_description')->nullable();

            $table->string('full_width_title')->nullable();

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
        Schema::dropIfExists('brands');
    }
}
