<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_group_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['mcq', 'fill_in_the_blank', 'true_false']);
            $table->text('question_text');
            $table->json('options')->nullable(); // JSON field to store MCQ options
            $table->text('answer'); // This will store the correct answer for both types
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
