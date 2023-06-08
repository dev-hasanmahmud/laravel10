<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;

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

// View Routes
Route::get('/', function () {
    return view('welcome');
});

// Basic Routing
Route::get('/greeting', function () {
    return 'Hello World';
});
Route::get('/user', [UserController::class, 'index'])->name('user.index'); // with Named Routes

// Dependency Injection
Route::post('/users', function (Request $request) {
    dd($request->all());
});

// Parameters & Dependency Injection
Route::get('/customer/{id}', function (string $id) {
    return 'Customer '.$id;
});

// Optional Parameters
Route::get('/client/{name?}', function (string $name = 'John') {
    return $name;
});
 
// Redirect Routes and Generating Redirects
Route::get('/redir', function () {
    return redirect()->route('user.index');
});

// Implicit Route Model Binding
Route::get('usr/{id}', function (User $id) {
    return $id;
});

// Explicit Route Model Binding
Route::get('/cus/{user}', function ($user) {
    return $user;
});
