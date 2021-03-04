<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Group route for middleware
Route::group(['middleware' => ['auth']], function () {

    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.list');
    Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
    Route::post('/expense/store', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('/expense/show/{expense}', [ExpenseController::class, 'show'])->name('expense.show');
    Route::post('/expense/update', [ExpenseController::class, 'update'])->name('expense.update');
    Route::get('/expense/delete/{expense}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
});

/*
|--------------------------------------------------------------------------
|  Group route for middleware using prefix
|--------------------------------------------------------------------------
    #Route middleware impliment
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense.list')->middleware('auth');
|
    Route::group(['middleware' => ['auth'], 'prefix' => 'user'], function () {

        Route::get('/expenses', [ExpenseController::class, 'index'])->name('expense.list')->middleware('auth');
    });
*/

Route::get('/inertia', function(){
    return Inertia::render('Home/index');
});
Route::inertia('/about',  function(){
    return Inertia::render('Home/index');
});
