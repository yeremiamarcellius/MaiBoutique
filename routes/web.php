<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can signup web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'auth'], function(){
    Route::get('/signin', [AuthController::class, 'signinPage'])->name('signinPage')->middleware('guest');
    Route::post('/signin', [AuthController::class, 'authenticate'])->name('signin')->middleware('guest');
    Route::get('/signup', [AuthController::class, 'signupPage'])->name('signupPage')->middleware('guest');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup')->middleware('guest');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});


Route::get('/home', [ItemController::class, 'home'])->name('home')->middleware('auth');
Route::get('/search', [ItemController::class, 'searchPage'])->name('searchPage')->middleware('auth');
Route::get('/search/items', [ItemController::class, 'search'])->name('search')->middleware('auth');
Route::get('/item-detail/{id}', [ItemController::class, 'show'])->name('show')->middleware('auth');
Route::get('/item-add', [ItemController::class, 'addPage'])->name('addItem')->middleware('isAdmin');
Route::post('/item-store', [ItemController::class, 'store'])->name('storeItem')->middleware('isAdmin');
Route::delete('/item-delete/{id}', [ItemController::class, 'delete'])->name('delete')->middleware('isAdmin');
Route::get('/view-profile', [UserController::class, 'show'])->name('showProfile')->middleware('auth');
Route::get('/edit-profile', [UserController::class, 'edit'])->name('editProfile')->middleware('isMember');
Route::patch('/update-profile', [UserController::class, 'update'])->name('updateProfile')->middleware('isMember');
Route::get('/edit-password', [UserController::class, 'editPass'])->name('editPassword')->middleware('auth');
Route::patch('/update-password', [UserController::class, 'updatePass'])->name('updatePassword')->middleware('auth');

Route::post('/add-cart/{id}', [CartController::class, 'store'])->name('storeCart')->middleware('isMember');
Route::get('/cart', [CartController::class, 'show'])->name('showCart')->middleware('isMember');
Route::get('/edit-cart/{id}', [CartController::class, 'editPage'])->name('editCart')->middleware('isMember');
Route::delete('/delete-cart/{id}', [CartController::class, 'delete'])->name('deleteCart')->middleware('isMember');

Route::post('/add-transaction/{totalprice}', [TransactionController::class, 'store'])->name('storeTransaction')->middleware('isMember');
Route::get('/transaction', [TransactionController::class, 'show'])->name('showTransaction')->middleware('isMember');
