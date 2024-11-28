<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserdashboardController extends Controller
{

    public function index()
    {
        User::findorFail(Auth::id())->update(["status" => "online"]);
        $borrowed = BorrowedBook::where('availability', 'borrowed')->where('user_id', Auth::id())->count();
        $returned = BorrowedBook::where('availability', 'returned')->where('user_id', Auth::id())->count();

        return view('user.userdashboard', ["borrowed" => $borrowed, "returned" => $returned]);
    }


    public function borrowedbooks()
    {
        $books = BorrowedBook::where('user_id', Auth::id())->where('borrowed_books.availability', 'Borrowed')
            ->join('books', 'borrowed_books.book_id', '=', 'books.id')->get();
        return view('user.userborrowbook', ['books' => $books]);
    }


    public function returnbooks()
    {
        $books = BorrowedBook::where('user_id', Auth::id())->where('borrowed_books.availability', 'Returned')->join('books', 'borrowed_books.book_id', '=', 'books.id')->get();

        return view('user.userreturnbook', ['books' => $books]);
    }
}
