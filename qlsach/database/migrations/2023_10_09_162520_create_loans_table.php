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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reader_id'); // Khóa ngoại đến độc giả
            $table->unsignedBigInteger('book_id'); // Khóa ngoại đến sách
            $table->dateTime('borrowed_at'); 
            $table->dateTime('due_at');  // thời điểm trả sách dự kiến
            $table->dateTime('returned_at')->nullable();  // thời điểm trả sách thực tế
            $table->timestamps();

            $table->foreign('reader_id')->references('id')->on('readers')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
