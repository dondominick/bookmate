<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowedBooksController extends Controller
{
    public function displayBorrowedBooks()
    {

        // Retrieve only the books that are currently borrowed
        $books = BorrowedBook::where('availability', "Borrowed")->get();
        return view('admin.adminborrowed', ['books' => $books]);
    }

    public function displayReturnBooks()
    {
        $books = BorrowedBook::where('availability', "Returned")->get();
        return view('admin.adminreturn', ['books' => $books]);
    }

    public function displayOverdues()
    {
        $book = BorrowedBook::where('availability', 'Overdue')->get();
        return view('admin.adminoverdue', ['books' => $book]);
    }

    public function returnBook(Request $request)
    {
        $fields = $request->validate([
            "borrow_id" => ['required'],
        ]);

        if ($fields['borrow_id']) {
            $book = BorrowedBook::find($fields['borrow_id']);
            $Book = Book::find($book->book_id);
            $Book->availability += 1;
            $Book->save();
            $book->returned_at = Carbon::now();
            $book->availability = "Returned";

            $book->save();
            return back()->with(['book' => "Book returned successfully"]);
        }
        return back()->withErrors(['book' => "Book cannot be found in the database"]);
    }
    // update all the borrwed books in the table
    private function updateAllBooks()
    {
        $today = Carbon::now();

        $books  = BorrowedBook::where('returned_at', false)->where('due_date', '<', $today)
            ->get();
        foreach ($books as $book) {
            $this->calculateFines($book->due_date);
        }
    }
    // for updating a borrowed book
    public function updateBook(Request $request)
    {

        if ($request->status == 'true') {
            $this->updateAllBooks();
            return back()->with(['update' => "Table is up to date"]);
        }
        $fields = $request->validate([
            "due_date" => ['required', 'date', 'after_or_equal:borrowed_at'],
            "availability" => ['required'],
            "borrowed_at" => ['required', 'date', 'before_or_equal:due_date'],
            "borrowed_id" => ['required'],

        ]);

        $book = BorrowedBook::findorFail($request['borrowed_id']);
        $book->due_date = $fields['due_date'];
        $book->borrowed_at = $fields['borrowed_at'];
        $book->fines = $this->calculateFines($fields['due_date']);
        if ($book->fines > 0) {
            $book->availability = "Overdue";
        }
        $book->availability = $fields['availability'];

        $book->save();

        return back()->with(["success" => "Borrowed Book updated successfully"]);
    }


    public function calculateFines($due_date)
    {
        $due_date = Carbon::parse($due_date);
        $present = Carbon::now();

        if ($present->greaterThan($due_date)) {

            $overdue = $due_date->diffInDays($present);

            return $overdue * 50;
        }

        return 0;
    }

    public static function updateFines() {}
}
