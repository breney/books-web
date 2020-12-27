<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

@if(isset(Auth::user()->email))
                <div class="alert alert-danger">  Welcome {{Auth::User()->name }} </div>
            @endif
*/

Route::get('/', [UsersController::class, 'login'])->name("login");
Route::post('/', [UsersController::class, 'checkLogin'])->name("checkLogin");

Route::get('/logout', [UsersController::class, 'logout'])->name("logout");

Route::get('/register', [UsersController::class, 'register'])->name("register");
Route::post('/register', [UsersController::class, 'registerUser'])->name("registerUser");

Route::get('/books',[BookController::class,'getBooks'])->name('books');

Route::get('/find',function(){return view('pages.find');})->name('find');
Route::get('/book',[BookController::class,'getBookById'])->name('bookById');
Route::get('/author',[AuthorController::class,'getAuthorById'])->name('authorById');

Route::get('/about', fn() => view('pages.about'))->name('about');

Route::get('/admin', [AdminController::class, 'adminHome'])->name('admin');

Route::get('/admininsert', [AdminController::class, 'adminInsert'])->name('admininsert');
Route::post('/insertBooks', [BookController::class, 'insertBooks'])->name('insertBooks');
Route::post('/insertAuthors', [AuthorController::class, 'insertAuthors'])->name('insertAuthors');


Route::get('/admindelete', [AdminController::class, 'adminDelete'])->name('admindelete');
Route::post('/deleteBook', [BookController::class, 'deleteBook'])->name('deleteBook');
Route::post('/deleteAuthor', [AuthorController::class, 'deleteAuthor'])->name('deleteAuthor');


Route::get('/adminupdate', [AdminController::class, 'adminUpdate'])->name('adminupdate');
Route::post('/updateBook', [BookController::class, 'updateBook'])->name('updateBook');
Route::post('/updateAuthor', [AuthorController::class, 'updateAuthor'])->name('updateAuthor');




