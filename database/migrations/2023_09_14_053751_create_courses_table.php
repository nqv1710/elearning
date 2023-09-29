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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name_course');
            $table->string('description')->nullable();
            $table->string('image', 2048)->nullable();
            $table->bigInteger('chapter_id')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('category_id'); // Cột khóa ngoại

            // $table->foreign('category_id')->references('id')->on('categories_course')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
