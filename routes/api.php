<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SubscriberAuthController;
use App\Http\Controllers\API\RegisterController ;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/dashboard', function () {
    // Route logic here
});


// --Admen  register and login and logout

Route::post('/register_admin', [App\Http\Controllers\API\RegisterController::class, 'register'])->name('registerad');
Route::post('/login_admin', [App\Http\Controllers\API\RegisterController::class, 'login'])->name('login_admin');

// --subscriber register and login and logout
Route::controller(SubscriberAuthController::class)->group(function(){

    Route::post('register_subscriber', 'register');

    Route::post('login__subscriber', 'login');

    Route::post('logout__subscriber', 'logout');


});


Route::group(['middleware' => 'AdminAPI'], function () {
    //  group of the  routs for Admin
});
// the middleware of subscriber in the api
Route::group(['middleware' => 'SubscriberAPI'], function () {
    //  group of the  routs for subscribers
});




