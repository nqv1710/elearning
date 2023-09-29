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
        Schema::create('quizzs', function (Blueprint $table) {
            $table->id();
            $table->string('question',255);
            $table->string('optionA',255);
            $table->string('optionB',255);
            $table->string('optionC',255);
            $table->string('optionD',255);
            $table->string('answer',255);
            $table->unsignedBigInteger('lesson_id'); // Cột khóa ngoại
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
        Schema::dropIfExists('quizzs');
    }
};
