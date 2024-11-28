<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\BorrowerSlip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowerSlipController extends Controller
{
    public function create(Request $request)
    {
        $slip = BorrowerSlip::where('user_id', Auth::id())->where('book_id', $request['book_id'])->get();
        if ($slip->first()) {

            return back()->withErrors(['borrow' => "You already have sent a request to borrow this book."]);
        }

        BorrowerSlip::create([
            "book_id" => $request['book_id'],
            "user_id" => Auth::id(),
            "borrow_date" => date('d/m/y'),
            "return_date" => date('d/m/y'),

        ]);

        return back()->with(['borrow' => "Book borrowed successfully"]);
    }

    public function update(Request $request)
    {
        $fields = $request->validate([
            "user_id" => ['required'],
            'book_id' => ['required'],
            "slip_id" => ['required'],
        ]);

        if ($request['status'] == "accepted") {

            // Get current date and set due date, 5 days from now
            $fields['due_date'] = date(Carbon::now()->addDays(3));
            $fields['borrowed_at'] = date(Carbon::now()->format('Y-m-d'));
            // Update Book Availability
            $book = Book::find($fields['book_id']);
            $stock = $book->availability;
            if ($stock <= 0) {
                return back()->withErrors(['status' => "Error! Book is currently unavailable"]);
            }
            $book->availability -= 1;
            $book->save();
            // Delete Borrowers Slip in the table
            $slip = BorrowerSlip::find($request['slip_id']);
            if (!$slip) {
                return back()->withErrors(['status' => "Book cannot be found in the database"]);
            }
            if ($slip->get()->first()) {
                $slip->delete();
            }
            // Create Borrowed Books record
            BorrowedBook::create($fields);
            return back()->with(['status' => "Borrower Slip accepted"]);
        } elseif ($request['status'] == "rejected") {

            $slip = BorrowerSlip::find($request['slip_id']);
            if ($slip->get()->first()) {
                $slip->delete();
                return back()->with(['status' => "Borrower Slip rejected"]);
            }
            return back()->withErrors(['status' => "Book cannot be found in the database"]);
        } else {
            return back()->withErrors(["status" => "Something went wrong!"]);
        }
    }
}
