<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('login');
});
Route::get('/welcome', function () {
    return view('welcome');
});



Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    

Route::group(['middleware' => ['web']], function () {
    // Route untuk UserController
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/showCreate', [UserController::class, 'showCreateUser'])->name('user.showCreateUser');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user', [UserController::class, 'store'])->name('user.store')->withoutMiddleware(['csrf']);
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


    // Route untuk UnitController
    Route::get('unit', [UnitController::class, 'index'])->name('unit.index');
    Route::get('unit/showCreate', [UnitController::class, 'showCreateUnit'])->name('unit.showCreateUnit');
    Route::get('unit/showUpdate', [UnitController::class, 'showUpdateUnit'])->name('unit.showUpdateUnit');
    Route::get('unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('unit', [UnitController::class, 'store'])->name('unit.store');
    Route::get('unit/{id}/edit', [UnitController::class, 'edit'])->name('unit.edit');
    Route::put('unit/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::delete('unit/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');


    // Route untuk JabatanController
    Route::get('jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::get('jabatan/showCreate', [JabatanController::class, 'showCreateJabatan'])->name('jabatan.showCreateJabatan');
    Route::get('jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
    Route::post('jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('jabatan/{id}/edit', [JabatanController::class, 'edit'])->name('jabatan.edit');
    Route::put('jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');
});

