<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\API\RegisterController;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// --blog section --
Route::get('showblogs',[App\Http\Controllers\BlogController::class,'home'])->name('showblogs');

Route::get('addblog',[App\Http\Controllers\BlogController::class,'create'])->name('addblog');

Route::post('storeblog',[App\Http\Controllers\BlogController::class,'store'])->name('storeblog');
Route::get('indexblog',[App\Http\Controllers\BlogController::class,'index'])->name('indexblog');
Route::get('editblog/{id}',[App\Http\Controllers\BlogController::class,'edit'])->name('editblog');
Route::post('updateblog',[App\Http\Controllers\BlogController::class,'update'])->name('updateblog');
Route::POST('deletblog/{N}',[App\Http\Controllers\BlogController::class,'destroy'])->name('deletblog');

// --end blog section --

// --subscriber section --

Route::get('add_subscriber',[App\Http\Controllers\SubscriberController::class,'create'])->name('add_subscriber');

Route::post('insert_subscriber',[App\Http\Controllers\SubscriberController::class,'store'])->name('insert_subscriber');
Route::get('loginpage_subscriber',[App\Http\Controllers\SubscriberController::class,'login_subscriber'])->name('loginpage_subscriber');
Route::post('login_subscriber',[App\Http\Controllers\SubscriberController::class,'login_functionality'])->name('login_subscriber');
Route::get('index_subscribers',[App\Http\Controllers\SubscriberController::class,'index'])->name('index_subscribers');
Route::get('show_subscriber/{id}',[App\Http\Controllers\SubscriberController::class,'show'])->name('show_subscriber');
Route::post('update_subscriber',[App\Http\Controllers\SubscriberController::class,'update'])->name('update_subscriber');

// --end subscriber section --



Route::group(['middleware' => 'SingleSession'], function () {
    //  group of the website routs
});








