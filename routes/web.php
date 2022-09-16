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
        Route::get('/administrator/user', [UserController::class, 'index'])->name('web.administrator.user.index');
        Route::get('/administrator/user/form', [UserController::class, 'formCreate'])->name('web.administrator.user.form-create');
        Route::get('/administrator/user/form/{id}', [UserController::class, 'formUpdate'])->name('web.administrator.user.form-update');
        Route::post('/administrator/user/create', [UserController::class, 'create'])->name('web.administrator.user.create');
        Route::post('/administrator/user/update', [UserController::class, 'update'])->name('web.administrator.user.update');
        Route::get('/administrator/company', [CompanyController::class, 'index'])->name('web.administrator.company.index');
        Route::get('/administrator/company/create', [CompanyController::class, 'form'])->name('web.administrator.company.form');
        Route::get('/administrator/procedure', [ProcedureController::class, 'index'])->name('web.administrator.procedure.index');
        Route::get('/administrator/procedure/create', [ProcedureController::class, 'form'])->name('web.administrator.procedure.form');
        Route::get('/administrator/reserve', [ReserveController::class, 'index'])->name('web.administrator.reserve.index');
        Route::get('/administrator/reserve/create', [ReserveController::class, 'form'])->name('web.administrator.reserve.form');
    });
});
