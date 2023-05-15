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

Route::get('/user/{id}/main/{index}', function (string $id, $index) {
    return 'User ' .$id  .'index' .$index;
});

Route::get('/user/profiles', function () {
    return 'practice name';
})->name('profile');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('profile', function () {
        return 'profile';
    })->name('profile');

    Route::get('setting', function () {
        return 'setting';
    })->name('setting');
});