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

// route basic, for root or homepage
Route::get('/', function () {
    return view('welcome');
});

// Tạo route, trong đó function định nghĩa bên dưới được áp dụng HTTP request methods có trong mảng, trong trường hợp này là ["get", "post"], ít dùng
Route::match(["get", "post"], '/match', function() {
    return 'HTTP request methods, get or post';
});

// Tương tự như match nhưng nó đáp ứng tất cả HTTP request methods
Route::any('/any', function() {
    return 'All HTTP request methods';
});


// Dependency Injection?
use Illuminate\Http\Request;
Route::get('/users', function (Request $request) {
    return $request;
});

// Bảo vệ CSRF, HTTP request methods có thể thay đổi tài nguyên [post, put, patch, delete] yêu cầu token CSRF. Nếu không, yêu cầu sẽ bị từ chối

// <form method="POST" action="/profile">
//     @csrf
//     ...
// </form>

Route::get('/a', function (Request $request) {
    return 'a';
});

Route::get('/b', function (Request $request) {
    return 'b';
});

// Redirect Routes, chuyển hướng. Từ /Aa chuyển đến /b, với status 301
Route::redirect('/a', '/b', 301);
// When using route parameters in redirect routes, the following parameters are reserved by Laravel and cannot be used: destination and status.?

// View routes,?
// Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
// When using route parameters in view routes, the following parameters are reserved by Laravel and cannot be used: view, data, status, and headers.?

// Route list
// https://laravel.com/docs/10.x/routing#the-route-list


// Truyền tham số trong route
Route::get('/user/{id}/index/{indexuser}', function (string $id, $indexuser) {
    return 'User ' .$id  .' and Index User ' .$indexuser;
});

// Parameters & Dependency Injection?
// Route::get('/user/{id}', function (Request $request, string $id) {
//     return 'User '.$id;
// });

// Optional Parameters, tham số tuỳ chọn cần giá trị mặc định, nếu tham số $name undefined hoặc null thì mặc định là 'John'
Route::get('name/{name?}', function (string $name = 'John') {
    return $name;
});

use Illuminate\Support\Facades\Http;
// Regular Expression Constraints
Route::get('/user/{email}', function (string $email) {
    return $email;
})->where('email', "[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");

// Hoặc sử dụng các methods có sẫn, Illuminate\Support\Facades\Route::where
Route::get('/category/{category}', function (string $category) {
    // Trả về mảng nếu khớp. Nếu không => request status 404
    return ['movie', 'song', 'painting'];
})->whereIn('category', ['movie', 'song', 'painting']);

// Global Constraints?

// Named Routes - name(), as().
Route::get('/user/long/abc', function () {
    return 'practice name, as';
})->name('account');

// Sử dụng route đã đặt tên 'account' ở trên
Route::get('/shortroute', function() {
    return redirect()->route("account");
});


// route nhóm, tiền tế
Route::prefix('user')->name('user.')->group(function () {
    Route::get('profile', function () {
        return 'profile';
    })->name('profile');

    Route::get('setting', function () {
        return Route::currentRouteName();
    })->name('setting');

    Route::get('details', function () {
        return 'details';
    })->name('details');
});

// Encoded Forward Slashes?
Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');
// Encoded forward slashes are only supported within the last route segment.