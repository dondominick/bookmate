<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrower_slips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->references('id')->on('books'); // Foreign key to books
            $table->foreignId('user_id')->references('id')->on('users'); // Foreign key to users
            $table->double('fines');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrower_slips');
    }
};
