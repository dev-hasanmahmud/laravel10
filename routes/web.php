<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\ProvisionServer;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;

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

Route::group(['middleware'=>'auth'], function(){
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

    // Accessing The Current Route
    Route::get('/atcr', function () {
        $route = Route::current();
        $name = Route::currentRouteName();
        $action = Route::currentRouteAction(); 
        return array('route' => $route,'name' => $name,'action' => $action);
    })->name('atcr.index');

    // Fallback Routes
    Route::fallback(function () {
        return view('welcome');
    });

    // Rate Limiting
    Route::get('/rl', function () {
        return 'Rate Limiting';
    })->middleware('throttle:hit_url');

    // Basic Controllers
    Route::get('/bc/{id}', [BasicController::class, 'show']);

    // Single Action Controllers
    Route::get('/sac', ProvisionServer::class);

    // Resource Controllers
    Route::resource('photos', PhotoController::class);

    // Specifying The Resource Model-    php artisan make:controller PhotoController --model=Photo --resource
    // Generating Form Requests-   php artisan make:controller PhotoController --model=Photo --resource --requests

    // Creating views and custom method
    Route::get('/contact', [PhotoController::class, 'contact']);

    // Passing data to views
    Route::get('contact_show/{id}', [PhotoController::class, 'contact_show']);

    // Rendering Inline Blade Templates
    Route::get('/ribt', function () {
        return Blade::render('Hello, {{ $name }}', ['name' => 'Julian Bashir']);
    });

    // Rendering Blade Fragments
    Route::get('/rbf', function () {
        $title = "Welcome to Laravel Learning";
        return view('fragment', ['title' => $title])->fragment('user-list');
    });

    // Insert Data
    Route::get('/insert', function(){
        DB::insert('insert into users(name, email, password) values(?, ?, ?)', ['Ayan Ullah', 'ayan@gmail.com', '123456']);
        return redirect()->back();
    });

    // Read Data
    Route::get('/read', function(){
        $results = DB::select('select * from users where id=?', [1]);
        // dd($results);

        foreach($results as $val) {
            return $val->name.' - '.$val->email;
        }
    });   

    // Update Data
    Route::get('/update', function(){
        $updated = DB::update('update users set name="Habib Khan" where id=?', [3]);
        return $updated;
    });  

    // Delete Data
    Route::get('/delete', function(){
        $deleted = DB::delete('delete from users where id=?', [3]);
        return $deleted;
    });  

    // Eloquent Read Data
    Route::get('/eread', function(){
        $datas = Partner::all();
        // dd($datas);

        foreach($datas as $val) {
            return $val->name.' - '.$val->bio;
        }
    });  

    // Eloquent Read with find Data
    Route::get('/ereadfind', function(){
        // $data = Partner::where('id', 1)->first();
        // $data = Partner::find(2);
        // $data = Partner::where('id', 1)->orderBy('id', 'desc')->take(1)->get();
        // $data = Partner::findOrFail(2);
        $data = Partner::findOrFail(2);

        return $data;
    });

    // Eloquent Insert Data
    Route::get('/einsert', function(){
        $partner = new Partner;
        // $partner = Partner::find(1);
        $partner->name = "Billiger";
        $partner->bio = "Billiger description";
        $partner->save();
    });

    // Eloquent create data
    Route::get('/create', function(){
        Partner::create(['name'=>'Shopnomix','bio'=>'Shopnomix Description']);
    });   

    // Eloquent update data
    Route::get('/eupdate', function(){
        Partner::where('id', 2)->update(['name'=>'Gaizel','bio'=>'Gaizel Description']);
    }); 

    // Eloquent delete data
    Route::get('/edelete', function(){
        // $data = Partner::find(1);
        // $data->delete();

        Partner::destroy(2);
    });

    // Eloquent delete data
    Route::get('/esoftdelete', function(){
        Partner::find(3)->delete();
    });

    // Eloquent retrive deleted data
    Route::get('/erdelete', function(){
        // $data = Partner::withTrashed()->where('id', 3)->get();
        $data = Partner::onlyTrashed()->where('id', 3)->get();
        return $data;
    });

    // Eloquent restore deleted data
    Route::get('/ersdelete', function(){
        Partner::withTrashed()->where('id', 3)->restore();
    });

    // Eloquent force delete data
    Route::get('/efdelete', function(){
        Partner::withTrashed()->where('id', 3)->forceDelete();
    });

    // Form create and Validation with Post Store
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post', [PostController::class, 'store']);

    // Form uploading file
    Route::get('/updoad/create', [FileController::class, 'create']);
    Route::post('/updoad', [FileController::class, 'store']);

    // Middleware
    Route::get('admin/dashboard', function(){
        return view('admin');
    })->middleware('admin');
});

// Authentication
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
