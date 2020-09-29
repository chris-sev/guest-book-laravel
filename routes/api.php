<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/messages', function () {
    return Message::take(10)->latest()->get();
});

// create a message from the input
Route::post('/messages', function () {
    $data = request()->only('text');
    $message = Message::create($data);
    return $message;
});
