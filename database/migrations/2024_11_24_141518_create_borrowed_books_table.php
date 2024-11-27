<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->string('availability')->default('Borrowed'); // 'Available' or 'Borrowed'
            $table->date('due_date'); // Due date for returning
            $table->timestamp('borrowed_at')->nullable(); // Borrowed date & time
            $table->timestamps(); // Created_at and Updated_at timestamps

            // Foreign key constraints
            $table->foreignId('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowed_books');
    }
}
