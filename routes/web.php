<?php

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


Route::get('/register', [UsersController::class, 'register'])->name("register");
Route::post('/register', [UsersController::class, 'registerUser'])->name("registerUser");

Route::get('/about', function () {
    return view('pages.about');
});


