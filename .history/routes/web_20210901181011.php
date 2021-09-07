<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MilesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//test Route
Route::get('/', function () {
    return view('welcome');
});


//Authentification route
Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');

    Route::resource('devis', \App\Http\Controllers\DevisController::class,);

});


require __DIR__.'/auth.php';

//Basic Route

Route::post("/home/create",[UserController::class,"devis"])->name('devis.create');

Route::get("/home",[UserController::class,"home"])->name('home');

Route::get("/about",[UserController::class,"about"])->name('about');

Route::get("/services",[UserController::class,"services"])->name('services');

Route::get("/packs",[UserController::class,"packs"])->name('packs');

Route::get("/packsPromo",[UserController::class,"packsPromo"])->name('packsPromo');

Route::get("/contact",[UserController::class,"contact"])->name('contact');

Route::get("/Login",[UserController::class,"Login"])->name('Login');

// route distance calcule
Route::get("/distance",[UserController::class,"distance"])->name('distance');

Route::post('/getMiles',[MilesController::class,"miles"]);







