<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowerSlip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowerSlipController extends Controller
{
    public function create(Request $request)
    {

        BorrowerSlip::create([
            "book_id" => $request['book_id'],
            "user_id" => Auth::id(),
            "fines" => 0,
            "borrow_date" => date('d/m/y'),
            "return_date" => date('d/m/y'),

        ]);

        return back()->with(['borrow' => "Book borrowed successfully"]);
    }
}
