<?php

use App\Http\Middleware\AdministratorMiddleware;
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
    return redirect()->route("login");
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
    Route::middleware(AdministratorMiddleware::class)->namespace('\App\Http\Controllers')->group(function () {
        Route::get('/administrator/user', [UserController::class, 'index'])->name('web.administrator.user.index');
        Route::get('/administrator/user/form/{id?}', [UserController::class, 'form'])->name('web.administrator.user.form');
        Route::post('/administrator/user/create', [UserController::class, 'create'])->name('web.administrator.user.create');
        Route::post('/administrator/user/update/{id}', [UserController::class, 'update'])->name('web.administrator.user.update');

        Route::get('/administrator/company', [CompanyController::class, 'index'])->name('web.administrator.company.index');
        Route::get('/administrator/company/form', [CompanyController::class, 'formCreate'])->name('web.administrator.company.form-create');
        Route::get('/administrator/company/form/{id}', [CompanyController::class, 'formUpdate'])->name('web.administrator.company.form-update');
        Route::post('/administrator/company/create', [CompanyController::class, 'create'])->name('web.administrator.company.create');
        Route::post('/administrator/company/update', [CompanyController::class, 'update'])->name('web.administrator.company.update');

        Route::get('/administrator/procedure', [ProcedureController::class, 'index'])->name('web.administrator.procedure.index');
        Route::get('/administrator/procedure/form/{id?}', [ProcedureController::class, 'form'])->name('web.administrator.procedure.form');
        Route::post('/administrator/procedure/create', [ProcedureController::class, 'create'])->name('web.administrator.procedure.create');
        Route::post('/administrator/procedure/update/{id}', [ProcedureController::class, 'update'])->name('web.administrator.procedure.update');

        Route::get('/administrator/reserve', [ReserveController::class, 'index'])->name('web.administrator.reserve.index');
        Route::get('/administrator/reserve/create', [ReserveController::class, 'form'])->name('web.administrator.reserve.form');
    });
});
