<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\DashboardController;
use App\Models\Kwitansi;
use App\Models\Kendaraan;

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
    $kendaraans = Kendaraan::get();
       
    return view('kendaraan.index', [
       'kendaraans' => $kendaraans,
    ]);
   })->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard')->middleware('can:super admin');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('can:super admin');

Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan')->middleware('can:admin');
Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('kendaraan.create')->middleware('can:admin');
Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('kendaraan.store')->middleware('auth');
Route::get('/kendaraan/detail/{kendaraan:id}', [KendaraanController::class, 'detail'])->name('kendaraan.detail')->middleware('can:admin');
Route::get('/kendaraan/{kendaraan:id}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit')->middleware('can:super admin');
Route::put('/kendaraan/{kendaraan:id}', [KendaraanController::class, 'update'])->name('kendaraan.update')->middleware('can:super admin');
Route::delete('/kendaraan/{kendaraan:id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy')->middleware('can:super admin');
Route::get('/kendaraan/detail/{kendaraan:id}/print', [KendaraanController::class, 'print'])->name('kendaraan.print')->middleware('can:admin');
Route::get('/kendaraan/export/excel', [KendaraanController::class, 'export_excel'])->middleware('can:admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage.users')->middleware('can:super admin');
Route::get('/manage-users/create', [ManageUsersController::class, 'create'])->name('manage-users.create')->middleware('can:super admin');
Route::post('/manage-users', [ManageUsersController::class, 'store'])->name('manage-users.store')->middleware('can:super admin');

Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('change-password');

Route::get('/manage-users/{id}/edit', [ManageUsersController::class, 'edit'])->name('manage-users.edit')->middleware('can:super admin');
Route::put('/manage-users/{id}', [ManageUsersController::class, 'update'])->name('manage-users.update')->middleware('can:super admin');

Route::delete('/manage-users/{userId}', [ManageUsersController::class, 'destroy'])->name('manage-users.destroy')->middleware('can:super admin');
Route::get('/manage-users/{userId}/', [ManageUsersController::class, 'addRole'])->name('add.role')->middleware('can:super admin');
Route::post('/manage-users/{userId}/assign-role', [ManageUsersController::class, 'assignRole'])->name('assign.role')->middleware('can:super admin');

Route::get('/user/{userId}/remove-role', [ManageUsersController::class, 'showRemoveRoleForm'])->name('remove.role')->middleware('can:super admin');
Route::post('/user/{userId}/remove-role', [ManageUsersController::class, 'removeRole'])->name('remove.role')->middleware('can:super admin');

