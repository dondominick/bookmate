<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('admin.admin_bms', ['books' => $books]);
    }

    public function create(Request $request)
    {
        $fields = $request->validate([
            "book_title" => ['required'],
            "author" => ['required'],
            "genre" => ['required'],
            "description" => ['required'],
            "published_date" => ['required'],
            "availability" => ['required', 'numeric'],
        ]);

        Book::create($fields);

        return back()->with(['book' => "Book added successfully"]);
    }

    public function store() {}

    public function edit() {}

    public function update(Request $request)
    {

        $fields = $request->validate([
            "book_title" => ['required'],
            "author" => ['required'],
            "genre" => ['required'],
            "description" => ['required'],
            "published_date" => ['required'],
            "availability" => ['required', 'numeric'],
        ]);
        $book = Book::find($request['bookId']);
        if (!$book) {
            return back()->withErrors(['book' => 'Book cannot be found in the database']);
        }
        $book->book_title = $fields['book_title'];
        $book->author = $fields['author'];
        $book->genre = $fields['genre'];
        $book->description = $fields['description'];
        $book->published_date = $fields['published_date'];
        $book->availability = $fields['availability'];

        $book->save();

        return back()->with(['success' => "Book updated successfully"]);
    }

    public function destroy(Request $request)
    {

        if (!$request->has('bookId')) {
            return back()->withErrors(['book', 'Book Id not passed in the request form']);
        }
        $book = Book::find($request['bookId']);
        if ($book != null) {
            $book->delete();
            return back()->with(['book' => "Book deleted successfully"]);
        }
        return back()->withErrors(['book' => "Failed to delete the book"]);
    }


    public function userBooks() {}


    public function browse()
    {
        $books = Book::where('availability', '>', 0)->get();
        return view('user.userbook', ['books' => $books]);
    }
}
