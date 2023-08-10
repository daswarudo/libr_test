<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\bkController;
use App\Http\Controllers\ForgetPasswordManager;
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

Route::controller(SampleController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

    Route::get('dashboard', 'dashboard')->name('dashboard');
    
    Route::get('add', 'add')->name('add');
    Route::get('addStud', 'addStud')->name('addStud');
    Route::get('addBorrow', 'addBorrow')->name('addBorrow');

});
//books
Route::resource('books', bkController::class);
Route::post('createBk', [bkController::class,'createBk']);
Route::get('dashboard', [bkController::class,'list']);
Route::get('edit/{id}', [bkController::class,'edit']);
Route::post('update/{id}', [bkController::class,'update']);//
Route::get('destroy/{id}', [bkController::class,'destroy']);
Route::get('show/{id}', [bkController::class,'show']);
Route::get('search', [bkController::class,'searchbk']);

//Students
Route::get('create', [bkController::class,'creates']);
Route::get('students', [bkController::class,'listStud']);
Route::get('destroyStud/{id}', [bkController::class,'destroyStud']);
Route::get('editStud/{id}', [bkController::class,'editStud']);
Route::post('updateStud/{id}', [bkController::class,'updateStud']);

//Borrow
Route::get('borrow', [bkController::class,'listBorrow']);
Route::get('createB', [bkController::class,'createB']);
Route::get('addBorrow', [bkController::class,'list2']);
Route::get('destroyBor/{id}', [bkController::class,'destroyBor']);
Route::get('editBor/{id}', [bkController::class,'editBor']);
Route::post('updateBor/{id}', [bkController::class,'updateBor']);
Route::get('borrow', [bkController::class,'listBorrow']);


Route::get("/forget-password",[ForgetPasswordManager::class,"forgetPassword"])->name("forget.password");
Route::post("/forget-password",[ForgetPasswordManager::class,"forgetPasswordPost"])->name("forget.password.post");
Route::get("/reset-password/{token}",[ForgetPasswordManager::class,"resetPassword"])->name("reset.password");
Route::post("/reset-password",[ForgetPasswordManager::class,"resetPasswordPost"])->name("reset.password.post");












