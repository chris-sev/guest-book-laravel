<?php

use Illuminate\Support\Facades\Route;
use App\Models\Message;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// get all messages
Route::get('/messages', function () {
    return Message::take(10)->latest()->get();
});

// create a message
Route::post('/messages', function () {
    $message = Message::create(request()->only('text'));
    return $message;
});
