<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{

    protected $table = "borrowed_books";



    protected $fillable = [
        "due_date",
        "borrowed_at",
        "book_id",
        "user_id",
    ];
}
