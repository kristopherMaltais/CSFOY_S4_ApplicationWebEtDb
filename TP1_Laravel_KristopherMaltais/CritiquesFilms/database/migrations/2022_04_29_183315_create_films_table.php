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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('release_year', 4);
            $table->smallinteger('length')->nullable();
            $table->text('description')->nullable();
            $table->enum('rating', ['G', 'PG','PG-13','R','NC-17'])->default('G');
            $table->tinyInteger('language_id');
            $table->string('special_features', 200)->nullable();
            $table->string('image', 40)->nullable();
            $table->timestamps();

            // Contrainte de table
            $table->foreign('language_id')->references('id')->on('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
};
