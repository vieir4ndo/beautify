<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\Administrator\CompanyController;
use App\Http\Controllers\Administrator\ProcedureController;
use App\Http\Controllers\Administrator\ReserveController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::namespace('\App\Http\Controllers')->group(function () {
        Route::get('/administrator/user', [UserController::class, 'index'])->name('web.admininistrator.user.index');
        Route::get('/administrator/user/create', [UserController::class, 'form'])->name('web.admininistrator.user.form');
        Route::get('/administrator/company', [CompanyController::class, 'index'])->name('web.admininistrator.company.index');
        Route::get('/administrator/company/create', [CompanyController::class, 'form'])->name('web.admininistrator.company.form');
        Route::get('/administrator/procedure', [ProcedureController::class, 'index'])->name('web.admininistrator.procedure.index');
        Route::get('/administrator/procedure/create', [ProcedureController::class, 'form'])->name('web.admininistrator.procedure.form');
        Route::get('/administrator/reserve', [ReserveController::class, 'index'])->name('web.admininistrator.reserve.index');
        Route::get('/administrator/reserve/create', [ReserveController::class, 'form'])->name('web.admininistrator.reserve.form');
    });
});
