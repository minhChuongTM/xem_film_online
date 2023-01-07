<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('avatar');            
            $table->string('name_film');
            $table->integer('movie_duration');
            $table->string('nation');
            $table->timestamp('year_of_manufacture')->nullable();
            $table->string('status');
            $table->text('film_content');
            $table->string('movie_format');
            $table->string('film_style');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('language');
            $table->unsignedBigInteger('film_company_id')->nullable();
            $table->foreign('film_company_id')->references('id')->on('film_company');
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
        Schema::dropIfExists('film');
    }
};
