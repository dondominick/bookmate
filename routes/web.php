<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBooksController;
use App\Http\Controllers\BorrowerSlipController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FcController;
use App\Http\Controllers\LibraryPolicyController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserdashboardController;
use App\Http\Middleware\AdminLayer;
use App\Models\BorrowedBook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// TESTING THIS SHIT

// Auth routes
Route::post('/register', [UserController::class, 'create']);
Route::get('/login', function () {
    return view('auth.login'); // Ensure this view exists
})->name('login');
Route::get('/register', function () {
    return view('auth.register'); // Ensure this view exists
})->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


// ADMIN 
Route::middleware([AdminLayer::class])->group(function () {

    // Admin Dashboard -> ROUTES RELATED TO ADMIN DASHBOARD OR ADMIN 
    Route::get('/admin/dashboard', [DashboardController::class, 'displayDashboard'])->name('admindashboard');
    Route::get('/admin/bookmanagement', [BookController::class, 'index'])->name('admin_bms');
    Route::get('/admin/genre', [DashboardController::class, 'displayGenre'])->name('admingenre');
    Route::view('/admin/overdue', 'admin.adminoverdue')->name('adminoverdue');
    Route::get('/userlogs', [DashboardController::class, 'index'])->name('userlogs');
    Route::get('/admin/slips', [DashboardController::class, 'displaySlips'])->name('adminSlips');

    // Retrieve Chart Data 
    Route::get('/chart-data', [ChartController::class, 'getChartData'])->name('chartData');
    Route::get('/user-chart-data', [ChartController::class, 'getUserChartData'])->name('userChartData');
    // Book Management Routes
    Route::delete('/admin/bookmanagement', [BookController::class, 'destroy']);
    Route::patch('/admin/bookmanagement', [BookController::class, 'update']);

    // POST ROUTES
    Route::post('/admin/bookmanagement', [BookController::class, 'create']);

    //Search
    Route::get('/admin/genre{search?}', [DashboardController::class, 'displaySearch'])->name('search');

    // For Borrower's Slip
    Route::post('/admin/slips', [BorrowerSlipController::class, 'update']);

    // For Admin Borrowed Books 
    Route::get('/admin/overdue', [BorrowedBooksController::class, 'displayOverdues'])->name('admin-overdue');
    Route::get('/admin/borrowed', [BorrowedBooksController::class, 'displayBorrowedBooks'])->name('adminborrowed');
    Route::patch('/admin/borrowed', [BorrowedBooksController::class, 'updateBook']);
});


// USER / GENERAL
Route::middleware(['auth'])->group(function () {

    // USER RELATED ROUTES 
    Route::get('/user/usergenre', function () {
        return view('user.usergenre');
    });

    Route::get('/user/dashboard', [UserdashboardController::class, 'index'])->name('userdashboard');
    // Borrowed Book
    Route::get('/user/borrowedbook', [UserdashboardController::class, 'borrowedbooks'])->name('borrow-books');
    Route::post('/user/borrowedbook', [BorrowedBooksController::class, 'returnBook']);

    // Returned Book
    Route::get('/user/returnbook', [UserdashboardController::class, 'returnbooks'])->name('return-books');

    // Route for browsing book catalog 
    Route::get('/browse-catalog', [BookController::class, 'browse'])->name('browse');

    // Route for Catalog
    Route::get('/catalogs', [BookController::class, 'browse'])->name('catalog');
});

// Borrow Books
Route::post('/catalogs', [BorrowerSlipController::class, 'create']);


// FAQ & Library Policy
Route::get('/library-policies', [LibraryPolicyController::class, 'index'])->name('library-policies.index');

// Subscription routes
Route::get('/subscribe', [SubscriberController::class, 'showSubscriptionForm'])->name('subscribe.form');
Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');

// Newsletter routes
Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter.index');
Route::post('/newsletters/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
