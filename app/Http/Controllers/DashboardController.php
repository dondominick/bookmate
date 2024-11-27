<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\BorrowerSlip;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        return view('admin.user_dashboard', ['users' => User::all()]);
    }

    public function displayGenre()
    {

        $books = Book::all();

        return view('admin.admingenre', ['books' => $books]);
    }

    public function dispayBorrowedBooks()
    {
        $book = BorrowedBook::where('availability', 'borrowed')->get();

        return view('admin.adminborrowed', ['books' => $book]);
    }

    public function displaySlips()
    {
        $slips = BorrowerSlip::join('users', 'borrower_slips.user_id', '=', 'users.id')
            ->join('books', 'borrower_slips.book_id', '=', 'books.id')
            ->get();
        return view('admin.borrower_slip', ['slips' => $slips]);
    }

    public function displayDashboard()
    {
        $books = Book::all()->count();
        $user = User::all()->count();
        $admin = User::where('role', 'admin')->get();

        $borrowed = BorrowedBook::where('availability', 'borrowed')->count();
        $returned = BorrowedBook::where('availability', 'returned')->count();
        return view('admin.admindashboard', ['books' => $books, 'users' => $user, "admin" => $admin]);
    }
}
