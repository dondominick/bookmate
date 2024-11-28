<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowerSlip extends Model
{

    protected $fillable = [
        "book_id",
        "user_id",
        "borrow_date",
        "return_date",
    ];

    protected $table = "borrower_slips";
}
