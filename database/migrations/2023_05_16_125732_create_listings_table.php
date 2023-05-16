<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('make_id')->unsigned()->index();
            $table->foreign('make_id')->references('id')->on('makes');
            $table->bigInteger('model_id')->unsigned()->index();
            $table->foreign('model_id')->references('id')->on('car_models');
            $table->string('fuel');
            $table->integer('year');
            $table->string('body');
            $table->integer('horsepower');
            $table->integer('capacity');
            $table->integer('doors');
            $table->string('color');
            $table->string('transmission');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
