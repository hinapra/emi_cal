<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmiRuleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicEmiController;

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


Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::get('/admin/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('admin.logout');

 Route::resource('/emis', EmiRuleController::class);

 
Route::get('/', [PublicEmiController::class, 'index'])->name('emi.calculator');
Route::post('/calculate', [PublicEmiController::class, 'calculate'])->name('emi.calculate');