<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowerSlip extends Model
{

    protected $fillable = [
        "book_id",
        "user_id",
        "fines",
        "borrow_date",
        "return_date",


    ];
}
