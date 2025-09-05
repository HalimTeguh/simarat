<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\UserController;
use App\Livewire\LetterSearch;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    redirect('/dashboard');
});


Route::get('/login', [AuthenticationController::class, 'index'])->name('login');

Route::resource('dashboard', DashboardController::class);

Route::resource('letters', LetterController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);

Route::get('/about', function () {
    return view('pages.about');
})->name('about');
