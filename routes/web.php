<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KwitansiController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElektronikController;
use App\Http\Controllers\KeteranganController;
use App\Http\Controllers\FurniturController;
use App\Http\Controllers\AksesoriController;
use App\Models\Kendaraan;
use App\Models\Elektronik;
use App\Models\Keterangan;
use App\Models\Furnitur;
use App\Models\Aksesori;

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
Route::get('/kendaraan/{kendaraan:id}/detail/', [KendaraanController::class, 'detail'])->name('kendaraan.detail')->middleware('can:admin');
Route::get('/kendaraan/{kendaraan:id}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit')->middleware('can:super admin');
Route::put('/kendaraan/{kendaraan:id}', [KendaraanController::class, 'update'])->name('kendaraan.update')->middleware('can:super admin');
Route::delete('/kendaraan/{kendaraan:id}', [KendaraanController::class, 'destroy'])->name('kendaraan.destroy')->middleware('can:super admin');
Route::get('/kendaraan/detail/{kendaraan:id}/print', [KendaraanController::class, 'print'])->name('kendaraan.print')->middleware('can:admin');
Route::get('/kendaraan/export/excel', [KendaraanController::class, 'export_excel'])->middleware('can:admin');

Route::get('/kendaraan/{kendaraan}/keterangan/{keterangan}/edit', [KeteranganController::class, 'edit'])->name('kendaraan.keterangan.edit');
Route::get('/kendaraan/{keterangan:id}/keterangan', [KeteranganController::class, 'index'])->name('kendaraan.keterangan.index');
Route::get('/kendaraan/{keterangan:id}/keterangan/create', [KeteranganController::class, 'create'])->name('kendaraan.keterangan.create');
Route::post('/kendaraan/{keterangan:id}/keterangan', [KeteranganController::class, 'store'])->name('kendaraan.keterangan.store');
Route::put('/kendaraan/{kendaraan:id}/keterangan/{keterangan:id}', [KeteranganController::class, 'update'])->name('kendaraan.keterangan.update');
Route::delete('/kendaraan/{kendaraan:id}/keterangan/{keterangan:id}', [KeteranganController::class, 'destroy'])->name('kendaraan.keterangan.destroy');

Route::get('/elektronik', [ElektronikController::class, 'index'])->name('elektronik')->middleware('can:admin');
Route::get('/elektronik/create', [ElektronikController::class, 'create'])->name('elektronik.create')->middleware('can:admin');
Route::post('/elektronik', [ElektronikController::class, 'store'])->name('elektronik.store')->middleware('auth');
Route::get('/elektronik/{elektronik:id}/detail/', [ElektronikController::class, 'detail'])->name('elektronik.detail')->middleware('can:admin');
Route::get('/elektronik/{elektronik:id}/edit', [ElektronikController::class, 'edit'])->name('elektronik.edit')->middleware('can:super admin');
Route::put('/elektronik/{elektronik:id}', [ElektronikController::class, 'update'])->name('elektronik.update')->middleware('can:super admin');
Route::delete('/elektronik/{elektronik:id}', [ElektronikController::class, 'destroy'])->name('elektronik.destroy')->middleware('can:super admin');
Route::get('/elektronik/detail/{elektronik:id}/print', [ElektronikController::class, 'print'])->name('elektronik.print')->middleware('can:admin');
Route::get('/elektronik/export/excel', [ElektronikController::class, 'export_excel'])->middleware('can:admin');

Route::get('/furnitur', [FurniturController::class, 'index'])->name('furnitur')->middleware('can:admin');
Route::get('/furnitur/create', [FurniturController::class, 'create'])->name('furnitur.create')->middleware('can:admin');
Route::post('/furnitur', [FurniturController::class, 'store'])->name('furnitur.store')->middleware('auth');
Route::get('/furnitur/{furnitur:id}/detail/', [FurniturController::class, 'detail'])->name('furnitur.detail')->middleware('can:admin');
Route::get('/furnitur/{furnitur:id}/edit', [FurniturController::class, 'edit'])->name('furnitur.edit')->middleware('can:super admin');
Route::put('/furnitur/{furnitur:id}', [FurniturController::class, 'update'])->name('furnitur.update')->middleware('can:super admin');
Route::delete('/furnitur/{furnitur:id}', [FurniturController::class, 'destroy'])->name('furnitur.destroy')->middleware('can:super admin');
Route::get('/furnitur/detail/{furnitur:id}/print', [FurniturController::class, 'print'])->name('furnitur.print')->middleware('can:admin');
Route::get('/furnitur/export/excel', [FurniturController::class, 'export_excel'])->middleware('can:admin');

Route::get('/aksesori', [AksesoriController::class, 'index'])->name('aksesori')->middleware('can:admin');
Route::get('/aksesori/create', [AksesoriController::class, 'create'])->name('aksesori.create')->middleware('can:admin');
Route::post('/aksesori', [AksesoriController::class, 'store'])->name('aksesori.store')->middleware('auth');
Route::get('/aksesori/{aksesori:id}/detail/', [AksesoriController::class, 'detail'])->name('aksesori.detail')->middleware('can:admin');
Route::get('/aksesori/{aksesori:id}/edit', [AksesoriController::class, 'edit'])->name('aksesori.edit')->middleware('can:super admin');
Route::put('/aksesori/{aksesori:id}', [AksesoriController::class, 'update'])->name('aksesori.update')->middleware('can:super admin');
Route::delete('/aksesori/{aksesori:id}', [AksesoriController::class, 'destroy'])->name('aksesori.destroy')->middleware('can:super admin');
Route::get('/aksesori/detail/{aksesori:id}/print', [AksesoriController::class, 'print'])->name('aksesori.print')->middleware('can:admin');
Route::get('/aksesori/export/excel', [AksesoriController::class, 'export_excel'])->middleware('can:admin');

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
