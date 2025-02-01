<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/chats', [\App\Http\Controllers\ChatController::class, 'index'])->name('chat');
Route::post('/chats/message', [\App\Http\Controllers\ChatController::class, 'messageReceive'])->name('chat.message');
Route::get('/chats/user/{receiver}', [\App\Http\Controllers\ChatController::class, 'chatUser'])->name('chat.user');
Route::post('/chats/private/{receiver_id}', [\App\Http\Controllers\ChatController::class, 'messagePrivateReceive'])->name('chat.private');

Route::get('/list/message', [\App\Http\Controllers\MessageController::class, 'listMessages'])->name('list.message');

Route::view('/users', 'users.listUsers')->name('users.list');
