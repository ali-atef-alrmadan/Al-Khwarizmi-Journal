<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->unsignedBigInteger('rating_id')->nullable();
            $table->unsignedBigInteger('research_id')->nullable();
            $table->unsignedBigInteger('reviewer_id')->nullable();
            $table->foreign('research_id')->on('research')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('author_id')->on('users')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rating_id')->on('ratings')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
    }
}
