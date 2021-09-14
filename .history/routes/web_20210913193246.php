<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\MilesController;
use App\Http\Controllers\CheckoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
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

    //admin
    Route::get('admin/devis',[AdminController::class,'payer'])->name('devis.payer');
    Route::get('admin/user',[AdminController::class,'user'])->name('admin.user');
    Route::get('admin/camion',[AdminController::class,'camion'])->name('admin.camion');
    Route::post('add',[AdminController::class,'add']);
    Route::get('admin/camion/delete/{id}',[AdminController::class,'deleteCamion']);
    Route::get('/admin/delete/{id}',[AdminController::class,'delete']);
   
    Route::resource('devis', \App\Http\Controllers\DevisController::class,);
    Route::get('/delete/{id}',[DevisController::class,'delete']);
    Route::get('/paiement/{id}',[CheckoutController::class,]);
    Route::get('/paiement/{id}',[CheckoutController::class,'checkout']);
    Route::get('/details/{id}',[CheckoutController::class,'show']);
    Route::post('checkout.succes',[CheckoutController::class,'afterpayment'])->name('checkout.succes');
   
  

});


require __DIR__.'/auth.php';

//Basic Route

Route::post('/home/create',[UserController::class,'devis'])->name('devis.create');

Route::get('/home',[UserController::class,'home'])->name('home');

Route::get('/about',[UserController::class,'about'])->name('about');

Route::get('/services',[UserController::class,'services'])->name('services');

Route::get('/packs',[UserController::class,'packs'])->name('packs');

Route::get('/packsPromo',[UserController::class,'packsPromo'])->name('packsPromo');

Route::get('/contact',[UserController::class,'contact'])->name('contact');

Route::get('/Login',[UserController::class,'Login'])->name('Login');

// route distance calcule
Route::get('/distance',[UserController::class,'distance'])->name('distance');

Route::post('getMiles',[MilesController::class,'miles'])->name('success');








